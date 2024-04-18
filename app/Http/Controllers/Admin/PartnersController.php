<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Partner;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::latest()->get();
        return view('admin.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partners.create');
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
            'image' => 'required|max:2048',
        ]);
        // Move Uploaded File
        $destinationPath = 'uploads/partners';
        $file = $request->image;
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move($destinationPath, $filename);

        Partner::create([
            'name' => $request->name,
            'website' => $request->website,
            'type' => $request->type,
            'image' => $filename
        ]);

        return redirect()->route('admin.partners.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partner = Partner::findOrfail($id);
        return view('admin.partners.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partner = Partner::findOrfail($id);
        return view('admin.partners.edit', compact('partner'));
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
            'image' => 'max:2048',
        ]);
        if ($request->image != NULL) {
            // Move Uploaded File
            $destinationPath = 'uploads/partners';
            $file = $request->image;
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($destinationPath, $filename);

            Partner::find($id)->update([
                'name' => $request->name,
                'website' => $request->website,
                'type' => $request->type,
                'image' => $filename
            ]);
        } else {
            Partner::find($id)->update([
                'name' => $request->name,
                'website' => $request->website,
                'type' => $request->type
            ]);
        }
        //    return $request->type;
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
        $partner = Partner::findOrFail($id);
        $partner->delete();

        return redirect()->route('admin.partners.index');
    }
}
