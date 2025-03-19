<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $p = Paket::all();
        return view('paket.index', compact('p'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $p = Paket::all();
        return view('paket.create', compact('p'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $p = new Paket();
        $p->nama = $request['nama'];
        $p->save();

        return redirect('paket');
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
        $p = Paket::find($id);
        return view('paket.edit', compact('p'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $p = Paket::find($id);
        $p->nama = $request['nama'];
        $p->save();

        return redirect('paket');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $p = Paket::find($id);
        $p->delete();
        return redirect('paket');
    }
}