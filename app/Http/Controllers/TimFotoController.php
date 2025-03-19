<?php

namespace App\Http\Controllers;

use App\Models\TimFoto;
use Illuminate\Http\Request;

class TimFotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tf = TimFoto::all();
        return view('timfoto.index', compact('tf'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tf = TimFoto::all();
        return view('timfoto.create', compact('tf'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tf = new TimFoto();
        $tf->nama = $request['nama'];
        $tf->nomor_hp = $request['nomor_hp'];
        $tf->status = $request['status'];
        $tf->save();

        return redirect('timfoto');
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
        $tf = TimFoto::find($id);
        return view('timfoto.edit', compact('tf'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tf = TimFoto::find($id);
        $tf->nama = $request['nama'];
        $tf->nomor_hp = $request['nomor_hp'];
        $tf->status = $request['status'];
        $tf->save();

        return redirect('timfoto');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tf = TimFoto::find($id);
        $tf->delete();
        return redirect('timfoto');
    }
}