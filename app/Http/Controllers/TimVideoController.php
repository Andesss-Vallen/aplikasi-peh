<?php

namespace App\Http\Controllers;

use App\Models\TimVideo;
use Illuminate\Http\Request;

class TimVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tv = TimVideo::all();
        return view('timvideo.index', compact('tv'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tv = TimVideo::all();
        return view('timvideo.create', compact('tv'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tv = new TimVideo();
        $tv->nama = $request['nama'];
        $tv->nomor_hp = $request['nomor_hp'];
        $tv->status = $request['status'];
        $tv->save();

        return redirect('timvideo');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tv = TimVideo::find($id);
        return view('timvideo.edit', compact('tv'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tv = TimVideo::find($id);
        $tv->nama = $request['nama'];
        $tv->nomor_hp = $request['nomor_hp'];
        $tv->status = $request['status'];
        $tv->save();

        return redirect('timvideo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tv = TimVideo::find($id);
        $tv->delete();
        return redirect('timvideo');
    }
}