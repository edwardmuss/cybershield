<?php

namespace App\Http\Controllers\Guest;

use App\User;
use App\Event;
use App\Ticket;
use App\Speaker;
use App\Partner;
use App\Registration;
use App\Country;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEventsRequest;
use App\Http\Requests\Admin\UpdateEventsRequest;
use Illuminate\Support\Facades\Auth;

class EventRegistrationController extends Controller
{
    /**
     * Display a listing of Event.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $upcoming_events = Event::where('end_time', '>=', Carbon::now()->toDateString())->orderBy('start_time', 'ASC')->paginate(3);
        // $past_events = Event::where('end_time', '<', Carbon::now()->toDateString())->orderBy('start_time', 'DESC')->paginate(12);
        // $latest_upcoming_event = Event::where('end_time', '>=', Carbon::now())->orderBy('start_time', 'ASC')->first();
        // $all_events = Event::orderBy('start_time', 'DESC')->paginate(5);

        // return view('guest.home', compact('upcoming_events', 'past_events', 'latest_upcoming_event', 'all_events'));
    }

    /**
     * Display Event.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        if (!Auth::user()) {
            return redirect()->route('auth.login')->with('error', 'You must login to register for this event');
        }
        $now = Carbon::now()->toDateString();
        $event = Event::where('slug', $slug)->first();
        $id = $event->id;
        $my_registrations_count = Registration::where('event_id', $id)->where('user_id', Auth::user()->id)->count();
        if ($my_registrations_count > 0) {
            $my_registrations = Registration::where('event_id', $id)->where('user_id', Auth::user()->id)->first();
        } else {
            $my_registrations = NULL;
        }


        if ($event->speaker_ids != null && $event->speaker_ids != 'null') {
            $speaker_ids = json_decode($event->speaker_ids);

            $speakers =  Speaker::wherein('id', $speaker_ids)->get();
            $speaker_count =  Speaker::wherein('id', $speaker_ids)->count();
        } else {

            $speakers = NULL;
            $speaker_count = 0;
        }
        if ($event->partner_ids != null && $event->partner_ids != 'null') {

            $partners = Partner::wherein('id', json_decode($event->partner_ids))->get();
            $partner_count = Partner::wherein('id', json_decode($event->partner_ids))->count();
        } else {

            $partners = NULL;
            $partner_count = 0;
        }
        if ($event->organizer_ids != null && $event->organizer_ids != 'null') {

            $organizers = Speaker::wherein('id', json_decode($event->organizer_ids))->get();
            $organizer_count = Speaker::wherein('id', json_decode($event->organizer_ids))->count();
        } else {

            $organizers = NULL;
            $organizer_count = 0;
        }

        // return $speaker_count;
        // return $partners;
        // return $organizer_count;

        // don't display tickets which are not available
        $match = [
            ['event_id', '=', $id],
            ['available_from', '<=', $now],
            ['available_to', '>=', $now]
        ];


        // used collect method to be able to sortBy
        $tickets = Ticket::where($match)->orderBy('price')->get();
        $countries = Country::orderBy('name')->get();
        // return $countries;

        $today = date("Y-m-d H:i:s");

        // now compare date as timestamp
        if (strtotime($event->end_time) >= strtotime($today)) {

            return view('guest.registration.show', compact('event', 'tickets', 'speakers', 'speaker_count', 'partners', 'partner_count', 'organizers', 'organizer_count', 'countries', 'my_registrations', 'my_registrations_count'));
        } else {

            return response('This event is already past, please register for upcoming events only');
        }
    }

    function store(Request $request)
    {
        $data = $request->all();

        $user = User::where('email', $data['email'])->first();

        if($user){
            $user_id = $user->id;
        }else{
            $user = User::create([
                'title' => $data['title'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'gender' => $data['gender'],
                'institution' => $data['institution'],
                'designation' => $data['designation'],
                'country' => $data['country'],
                'code' => $data['code'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'role_id' => 3,
            ]);

            $user_id = $user->id;
        }

        
        if ($user) {
            $to = $data['email'];
            $to_name = $data['first_name'] . ' ' . $data['last_name'];
            $my_registrations_count = Registration::where('event_id', 7)->where('user_id', $user_id)->count();

        if ($my_registrations_count == 0) {
            if ($data['event_id'] != NULL && $data['ticket_id'] != NULL) {
                $event = Event::find($data['event_id']);
                $event_create = Registration::create([
                    'event_id' => $data['event_id'],
                    'ticket_id' => $data['ticket_id'],
                    // 'reference' => $data['reference'],
                    'type' => $data['type'],
                    'attendance_mode' => $data['attendance_mode'],
                    'payment_mode' => $data['payment_mode'],
                    'user_id' => $user->id,
                ]);

                if ($event_create) {
                    $subject = "Welcome!";
                    $email_data = (object) array(
                        'title' => 'Welcome <b>' . $to_name . '</b>',
                        'link' => "https://cybershield.daystar.ac.ke",
                        'body' => "Thank You for registering for <b> $event->title </b> happening on <b>" . date('d', strtotime($event->start_time)) . '-' . date('d F, Y', strtotime($event->end_time)) . "</b> at $event->venue"
                    );
                    sendMail($email_data, $to, $to_name, $subject);
                }else{
                    return redirect()->back()->with('error', 'Oops Something went wrong');
                }
            }
            return redirect()->back()->with('success', 'Your Details have been submitted Successfully! We will get back to you.');
            // $subject = "Daystar University Login Credential";
            // $password = $data['password'];
            // $email_data = (object) array(
            //     'title' => 'Hi <b>' . $to_name . '</b>',
            //     'link' => route('auth.login'),
            //     'body' => "Thank You for signing up with Daystar Conferences. Here is your login credentials <p> Email: <b>$to</b> <br> Password: <b>$password</b>"
            // );
            // sendMail($email_data, $to, $to_name, $subject);
        }else{
            return redirect()->back()->with('error', 'You have already registered for this event');
        }
    }

        // $event = Event::find($request->event_id);
        // $my_registrations_count = Registration::where('event_id', $request->event_id)->where('user_id', Auth::user()->id)->count();

        // if ($my_registrations_count == 0) {
        //     $save = User::find(Auth::user()->id)->update([
        //         'country' => $request->country,
        //         'code' => $request->code,
        //         'phone' => $request->phone,
        //         'gender' => $request->gender,
        //         'institution' => $request->institution,
        //         'designation' => $request->designation,
        //     ]);

        //     $event_create = Registration::create([
        //         'event_id' => $request->event_id,
        //         'ticket_id' => $request->ticket_id,
        //         'reference' => $request->reference,
        //         'user_id' => Auth::user()->id,
        //     ]);

        //     if ($event_create) {
        //         $to = Auth::user()->email;
        //         $to_name = Auth::user()->first_name . ' ' . Auth::user()->last_name;
        //         $subject = "Welcome!";
        //         $email_data = (object) array(
        //             'title' => 'Welcome <b>' . Auth::user()->first_name . '</b>',
        //             'link' => route('account.eventregistration.show', $event->slug),
        //             'body' => "Thank You for registering for $event->title happening on <b>" . date('d', strtotime($event->start_time)) . '-' . date('d F, Y', strtotime($event->end_time)) . "</b> at $event->venue"
        //         );
        //         sendMail($email_data, $to, $to_name, $subject);
        //         return redirect()->back()->with('success', 'Your Details have been submitted Successfully! We will get back to you. You can also track your registration by visiting your account profile ');
        //     } else {
        //         return redirect()->back()->with('error', 'Oops Something went wrong');
        //     }
        // } else {
        //     return redirect()->back()->with('error', 'You have already registered for this event');
        // }
    }

    function dashboard()
    {
        return view('auth.dashboard');
    }
}
