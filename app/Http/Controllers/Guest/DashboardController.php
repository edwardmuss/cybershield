<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Event;
use App\Ticket;
use App\Speaker;
use App\Partner;
use App\Country;
use Carbon\Carbon;
use App\Registration;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    function dashboard()
    {
        $countries = Country::orderBy('name')->get();
        return view('guest.profile.index', compact('countries'));
    }

    function update(Request $request)
    {
        if ($request->password == NULL) {
            $data = request()->except('password', '_token');
        } else {
            $data = request()->except('_token');
            $data['password'] = bcrypt($request->password);
        }

        $save = User::find(Auth::user()->id)->update($data);

        if ($save) {
            return redirect()->back()->with('success', 'Successfully updated');
        } else {
            return redirect()->back()->with('error', 'Oops Something went wrong');
        }
    }

    function conferences()
    {
        $upcoming_events = Event::where('end_time', '>=', Carbon::now()->toDateString())->orderBy('start_time', 'ASC')->paginate(12);
        $past_events = Event::where('end_time', '<', Carbon::now()->toDateString())->orderBy('start_time', 'DESC')->paginate(12);
        $latest_upcoming_event = Event::where('end_time', '>=', Carbon::now())->orderBy('start_time', 'ASC')->first();
        $all_events = Event::orderBy('start_time', 'DESC')->paginate(5);
        return view('guest.profile.conferences', compact('upcoming_events', 'past_events', 'latest_upcoming_event', 'all_events'));
    }

    function my_registrations()
    {
        $my_registrations = Registration::with('user')->with('event')->where('user_id', Auth::user()->id)->paginate(12);
        return view('guest.profile.my-registrations', compact('my_registrations'));
    }

    function abstracts()
    {
        return view('guest.profile.abstracts');
    }

    function links()
    {
        $upcoming_events = Event::where('end_time', '>=', Carbon::now()->toDateString())->whereNotNull('meeting_link')->orderBy('start_time', 'ASC')->paginate(12);

        return view('guest.profile.links', compact('upcoming_events'));
    }

    function certificates()
    {
        return view('guest.profile.certificates');
    }

    function feedback()
    {
        return view('guest.profile.feedback');
    }
}
