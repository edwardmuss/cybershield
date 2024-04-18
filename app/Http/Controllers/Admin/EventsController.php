<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Partner;
use App\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEventsRequest;
use App\Http\Requests\Admin\UpdateEventsRequest;
use Illuminate\Support\Str;

class EventsController extends Controller
{
    /**
     * Display a listing of Event.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('event_access')) {
            return abort(401);
        }

        $events = Event::all();

        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating new Event.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('event_create')) {
            return abort(401);
        }
        $partners = \App\Partner::get()->pluck('name', 'id');
        $speakers = \App\Speaker::get()->pluck('name', 'id');
        // $speakers = \App\Speaker::get()->pluck('name', 'id')->prepend('Please select', '');
        return view('admin.events.create', compact('partners', 'speakers'));
    }

    /**
     * Store a newly created Event in storage.
     *
     * @param  \App\Http\Requests\StoreEventsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventsRequest $request)
    {
        if (!Gate::allows('event_create')) {
            return abort(401);
        }

        $data = $request->all();

        if ($request->image != null) {
            // Move Uploaded File
            $destinationPath = 'uploads/events';
            $file = $request->image;
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $data['image'] = $filename;
        }

        if ($request->cfp_file != null) {
            // Move Uploaded File
            $destinationPath = 'uploads/abstracts';
            $file = $request->cfp_file;
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $data['cfp_file'] = $filename;
        }
        $data['partner_ids'] = json_encode($request->partner_ids);
        $data['speaker_ids'] = json_encode($request->speaker_ids);
        $data['organizer_ids'] = json_encode($request->organizer_ids);
        $data['slug'] = Str::slug($request->title);
        // return $data;
        // Insert data
        $event = Event::create($data);

        // Event::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'start_time' => $request->start_time,
        //     'end_time' => $request->end_time,
        //     'slider_top_text' => $request->slider_top_text,
        //     'slider_middle_text' => $request->slider_middle_text,
        //     'slider_bottom_text' => $request->slider_bottom_text,
        //     'venue' => $request->venue,
        //     'mode' => $request->mode,
        //     'host' => $request->host,
        //     'theme' => $request->theme,
        //     'day1_prog' => $request->day1_prog,
        //     'day2_prog' => $request->day2_prog,
        //     'day3_prog' => $request->day3_prog,
        //     'day4_prog' => $request->day4_prog,
        //     'partner_ids' => $request->partner_ids,
        //     'speaker_ids' => $request->speaker_ids,
        //     'image' => $filename,
        //     'slug' => Str::slug($request->title),
        // ]);
        // }

        return redirect()->route('admin.events.index');
    }


    /**
     * Show the form for editing Event.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('event_edit')) {
            return abort(401);
        }

        $event = Event::findOrFail($id);

        $all_partners = Partner::get();
        $all_speakers = Speaker::get();

        $speakers_ids = json_decode($event->speaker_ids);
        $organizer_ids = json_decode($event->organizer_ids);

        // foreach ($speaker_ids as $value) {
        //     $speakers2 = Speaker::find($value);
        //     $speakers3[] = $speakers2;
        // }

        // foreach (explode(', ', $event->partner_ids) as $value) {
        //     $partners_ids[] = $value;
        // }

        $partners_ids = json_decode($event->partner_ids);

        // return $partners_ids;
        return view('admin.events.edit', compact('event', 'all_partners', 'partners_ids', 'all_speakers', 'speakers_ids', 'organizer_ids'));
    }

    /**
     * Update Event in storage.
     *
     * @param  \App\Http\Requests\UpdateEventsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventsRequest $request, $id)
    {
        if (!Gate::allows('event_edit')) {
            return abort(401);
        }

        $data = $request->all();

        if ($request->image != null) {
            // Move Uploaded File
            $destinationPath = 'uploads/events';
            $file = $request->image;
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $data['image'] = $filename;
        }

        if ($request->cfp_file != null) {
            // Move Uploaded File
            $destinationPath = 'uploads/abstracts';
            $file = $request->cfp_file;
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $data['cfp_file'] = $filename;
        }

        if ($request->boa_file != null) {
            // Move Uploaded File
            $destinationPath = 'uploads/abstracts';
            $file = $request->boa_file;
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $data['boa_file'] = $filename;
        }

        $data['partner_ids'] = json_encode($request->partner_ids);
        $data['speaker_ids'] = json_encode($request->speaker_ids);
        $data['slug'] = Str::slug($request->slug);

        $event = Event::findOrFail($id)->update($data);

        // return $data;

        // if ($request->image != null) {

        //     // Move Uploaded File
        //     $destinationPath = 'uploads/events';
        //     $file = $request->image;
        //     $filename = time() . '_' . $file->getClientOriginalName();
        //     $file->move($destinationPath, $filename);

        //     $event = Event::findOrFail($id)->update([
        //         'title' => $request->title,
        //         'description' => $request->description,
        //         'start_time' => $request->start_time,
        //         'end_time' => $request->end_time,
        //         'slider_top_text' => $request->slider_top_text,
        //         'slider_middle_text' => $request->slider_middle_text,
        //         'slider_bottom_text' => $request->slider_bottom_text,
        //         'venue' => $request->venue,
        //         'mode' => $request->mode,
        //         'host' => $request->host,
        //         'theme' => $request->theme,
        //         'day1_prog' => $request->day1_prog,
        //         'day2_prog' => $request->day2_prog,
        //         'day3_prog' => $request->day3_prog,
        //         'day4_prog' => $request->day4_prog,
        //         'partner_ids' => $request->partner_ids,
        //         'speaker_ids' => $request->speaker_ids,
        //         'slug' => Str::slug($request->slug),
        //         'image' => $filename,
        //     ]);
        // } else {
        //     $event = Event::findOrFail($id)->update([
        //         'title' => $request->title,
        //         'description' => $request->description,
        //         'start_time' => $request->start_time,
        //         'end_time' => $request->end_time,
        //         'slider_top_text' => $request->slider_top_text,
        //         'slider_middle_text' => $request->slider_middle_text,
        //         'slider_bottom_text' => $request->slider_bottom_text,
        //         'venue' => $request->venue,
        //         'mode' => $request->mode,
        //         'host' => $request->host,
        //         'theme' => $request->theme,
        //         'day1_prog' => $request->day1_prog,
        //         'day2_prog' => $request->day2_prog,
        //         'day3_prog' => $request->day3_prog,
        //         'day4_prog' => $request->day4_prog,
        //         'partner_ids' => $request->partner_ids,
        //         'speaker_ids' => $request->speaker_ids,
        //         'slug' => Str::slug($request->slug),
        //     ]);
        // }

        //   return $event;

        return redirect()->back();
    }


    /**
     * Display Event.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Gate::allows('event_view')) {
            return abort(401);
        }
        $tickets = \App\Ticket::where('event_id', $id)->get();

        $event = Event::findOrFail($id);

        return view('admin.events.show', compact('event', 'tickets'));
    }


    /**
     * Remove Event from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('event_delete')) {
            return abort(401);
        }
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('admin.events.index');
    }

    /**
     * Delete all selected Event at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (!Gate::allows('event_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Event::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
