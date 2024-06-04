<?php

namespace App\Http\Controllers\Guest;

use App\Event;
use App\Ticket;
use App\Speaker;
use App\Partner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEventsRequest;
use App\Http\Requests\Admin\UpdateEventsRequest;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    /**
     * Display a listing of Event.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $upcoming_events = Event::where('end_time', '>=', Carbon::now()->toDateString())->orderBy('start_time', 'ASC')->paginate(3);
        $past_events = Event::where('end_time', '<', Carbon::now()->toDateString())->orderBy('start_time', 'DESC')->paginate(12);
        $latest_upcoming_event = Event::where('end_time', '>=', Carbon::now())->orderBy('start_time', 'ASC')->first();
        $all_events = Event::orderBy('start_time', 'DESC')->paginate(5);

        // if(Auth::user() && Auth::user()->role_id == 1){
        //     return view('admin.dashboard');
        // }elseif(Auth::user() && Auth::user()->role_id == 2){
        //     return view('admin.dashboard');
        // }else{
        //     return view('guest.home', compact('upcoming_events', 'past_events', 'latest_upcoming_event', 'all_events'));
        // }

        $now = Carbon::now()->toDateString();
        $event = Event::where('id', 7)->first();
        $id = $event->id;

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

        return view('guest.home', compact('event', 'tickets', 'speakers', 'speaker_count', 'partners', 'partner_count', 'organizers', 'organizer_count', 'upcoming_events', 'past_events', 'latest_upcoming_event', 'all_events'));
    }

    /**
     * Display Event.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $now = Carbon::now()->toDateString();
        $event = Event::where('slug', $slug)->first();
        $id = $event->id;

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

        return view('guest.events.show', compact('event', 'tickets', 'speakers', 'speaker_count', 'partners', 'partner_count', 'organizers', 'organizer_count'));
    }

    public function resources() {
        return view('guest.events.resources');
    }
}
