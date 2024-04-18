<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Ticket;
use App\Registration;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePaymentsRequest;
use App\Http\Requests\Admin\UpdateRegistrationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use App\Jobs\SendEmailJob;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class RegistrationsController extends Controller
{
    /**
     * Display a listing of Payment.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('registration_access')) {
            return abort(401);
        }

        $events = Event::where('end_time', '>=', Carbon::now()->toDateString())->orderBy('start_time', 'ASC')->get();

        // return $events;

        return view('admin.registrations.index', compact('events'));
    }

    /**
     * Show the form for creating new Registration.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('registration_create')) {
            return abort(401);
        }
        return view('admin.payments.create');
    }

    /**
     * Store a newly created Registration in storage.
     *
     * @param  \App\Http\Requests\StorePaymentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentsRequest $request)
    {
        if (!Gate::allows('registration_create')) {
            return abort(401);
        }
        $payment = Registration::create($request->all());



        return redirect()->route('admin.payments.index');
    }

    /**
     * Display Registration.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Gate::allows('registration_view')) {
            return abort(401);
        }

        $registrations = Registration::with(['user', 'event', 'ticket'])->where('event_id', $id)->get();

        // return $registrations;

        return view('admin.registrations.show', compact('registrations'));
    }


    /**
     * Show the form for editing Registration.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('registration_edit')) {
            return abort(401);
        }

        $registration = Registration::with(['user', 'event', 'ticket'])->findOrFail($id);
        $event_id = $registration->event_id;
        $now = Carbon::now()->toDateString();

        // don't display tickets which are not available
        $match = [
            ['event_id', '=', $event_id],
            ['available_from', '<=', $now],
            ['available_to', '>=', $now]
        ];

        // used collect method to be able to sortBy
        $tickets = Ticket::where($match)->orderBy('price')->get();

        // return $tickets;

        return view('admin.registrations.edit', compact('registration', 'tickets'));
    }

    /**
     * Update Registration in storage.
     *
     * @param  \App\Http\Requests\UpdateRolesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegistrationRequest $request, $id)
    {
        if (!Gate::allows('registration_edit')) {
            return abort(401);
        }
        $registration = Registration::findOrFail($id);
        $save = $registration->update($request->all());
        $event = Event::findOrFail($registration->event_id);
        $user = User::findOrFail($registration->user_id);
        $status = $request->status;
        $remarks = $request->remarks;

        if ($save) {
            $to = $user->email;
            $to_name = $user->first_name . ' ' . $user->last_name;
            $subject = "Conference Status";
            $email_data = (object) array(
                'title' => 'Dear <b>' . $user->first_name . '</b>',
                'link' => route('account.profile.my-registrations'),
                'link_text' => "DASHBOARD",
                'date' => date('d F, Y', strtotime(date('Y-m-d'))),
                'body' => "The Status for <i>$event->title</i> has changed to <b>$status</b>, <br> <b>Remarks:</b> $remarks "
            );
            // sendMail($email_data, $to, $to_name, $subject);
            dispatch(new SendEmailJob($email_data, $to, $to_name, $subject));
        }

        return redirect()->route('admin.registrations.show', $registration->event_id);
    }


    /**
     * Remove Registration from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('registration_delete')) {
            return abort(401);
        }
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('admin.registrations.index');
    }

    /**
     * Delete all selected Registration at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (!Gate::allows('registration_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Role::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    /**
     * Display Registration.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unregistered($id)
    {
        if (!Gate::allows('registration_view')) {
            return abort(401);
        }

        $registrations = Registration::with(['user', 'event', 'ticket'])->where('event_id', $id)->get();
        $event = Event::findOrFail($id);

        foreach ($registrations as $data) {
            $user_id[] = $data->user->id;
        }
        $unregistered = User::whereNotIn('id', $user_id)->where('role_id', 3)->get();
        // return $event;

        return view('admin.registrations.unregistered', compact('unregistered', 'event'));
    }

    /**
     * Display Mail Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function communication($id)
    {
        if (!Gate::allows('registration_view')) {
            return abort(401);
        }
        $event = Event::findOrFail($id);
        return view('admin.registrations.communication', compact('event'));
    }

    /**
     * Send Mail.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sendmail(Request $request, $id)
    {
        if (!Gate::allows('registration_view')) {
            return abort(401);
        }
        
        if ($request->list == '') {
            return abort(401);
        }

        $event = Event::findOrFail($id);
        $user_id = [];

        if ($request->list == 'unregistered') {
            $registrations = Registration::with(['user', 'event', 'ticket'])->where('event_id', $id)->get();
            foreach ($registrations as $data) {
                $user_id[] = $data->user->id;
            }
            $data = User::whereNotIn('id', $user_id)->where('role_id', 3)->get();
        }

        if ($request->list == 'registered') {
            $registrations = Registration::with(['user', 'event', 'ticket'])->where('event_id', $id)->get();
            foreach ($registrations as $data) {
                $user_id[] = $data->user->id;
            }
            $data = User::whereIn('id', $user_id)->where('role_id', 3)->get();
        }

        if ($request->list == 'pending') {
            $registrations = Registration::with(['user', 'event', 'ticket'])->where('event_id', $id)->where('status', 'Pending')->get();
            foreach ($registrations as $data) {
                $user_id[] = $data->user->id;
            }
            $data = User::whereIn('id', $user_id)->where('role_id', 3)->get();
        }

        if ($request->list == 'rejected') {
            $registrations = Registration::with(['user', 'event', 'ticket'])->where('event_id', $id)->where('status', 'Rejected')->get();
            foreach ($registrations as $data) {
                $user_id[] = $data->user->id;
            }
            $data = User::whereIn('id', $user_id)->where('role_id', 3)->get();
        }

        if ($request->list == 'confirmed') {
            $registrations = Registration::with(['user', 'event', 'ticket'])->where('event_id', $id)->where('status', 'Confirmed')->get();
            foreach ($registrations as $data) {
                $user_id[] = $data->user->id;
            }
            $data = User::whereIn('id', $user_id)->where('role_id', 3)->get();
        }
        
        if ($request->list == 'admin') {
            $data = User::where('role_id', 1)->get();
        }

        if ($request->list == 'all') {
            $data = User::where('role_id', 3)->get();
        }

        if ($data->count() > 0) {
            foreach ($data as $data) {
                $list = $request->list;
                $subject = $request->subject;
                $link = $request->link;
                $link_text = $request->link_text;
                $to = $data->email;
                $to_name = $data->title . ' ' . $data->first_name . ' ' . $data->middle_name . ' ' . $data->last_name;

                $body = $request->mailbody;
                $body = str_replace('%TITLE%', $data->title, $body);
                $body = str_replace('%NAME%', $to_name, $body);

                $email_data = (object) array(
                    'title' => 'Hi ' . $to_name,
                    'link' => $link,
                    'link_text' => $link_text,
                    'date' => date('d F, Y', strtotime(date('Y-m-d'))),
                    'body' => $body,
                    'email' => $to
                );
                // sendDefaultMail($email_data, $to, $to_name, $subject);
                dispatch(new SendEmailJob($email_data, $to, $to_name, $subject));
            }
        }
        // sendDefaultMail($email_data, $to, $to_name, $subject);
        // return $email_data;
        return redirect()->back()->with('success', 'Emails Send Successfully');
    }

    public function nametags($id)
    {
        $registrations = Registration::with(['user', 'event', 'ticket'])->where('event_id', $id)->get();
        $event = Event::findOrFail($id);
        $pdf = PDF::loadView('admin.nametags', compact('registrations'));
        $pdf->setPaper('A4', '');
        return $pdf->stream(str_replace(' ', '', $event->title));
    }
}
