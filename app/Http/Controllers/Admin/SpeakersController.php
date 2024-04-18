<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Speaker;

class SpeakersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $speakers = Speaker::latest()->get();
        return view('admin.speakers.index', compact('speakers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.speakers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'bio' => 'required',
            'image' => 'required|max:2048',
        ]);
        // Move Uploaded File
        $destinationPath = 'uploads/speakers';
        $file = $request->image;
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move($destinationPath, $filename);

        Speaker::create([
            'name' => $request->name,
            'title' => $request->title,
            'role' => $request->role,
            'bio' => $request->bio,
            'slug' => Str::slug($request->name),
            'image' => $filename
        ]);

        return redirect()->route('admin.speakers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $speaker = Speaker::findOrfail($id);
        return view('admin.speakers.show', compact('speaker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $speaker = Speaker::findOrfail($id);
        return view('admin.speakers.edit', compact('speaker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'bio' => 'required',
        ]);
        if ($request->image != NULL) {
            // Move Uploaded File
            $destinationPath = 'uploads/speakers';
            $file = $request->image;
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($destinationPath, $filename);

            Speaker::find($id)->update([
                'name' => $request->name,
                'title' => $request->title,
                'role' => $request->role,
                'bio' => $request->bio,
                'slug' => Str::slug($request->slug),
                'image' => $filename
            ]);
        } else {
            Speaker::find($id)->update([
                'name' => $request->name,
                'title' => $request->title,
                'role' => $request->role,
                'bio' => $request->bio,
                'slug' => Str::slug($request->slug),
            ]);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $speaker = Speaker::findOrFail($id);
        $speaker->delete();

        return redirect()->route('admin.speakers.index');
    }
}
