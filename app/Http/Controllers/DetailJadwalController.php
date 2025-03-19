<?php

namespace App\Http\Controllers;

use App\Models\DetailJadwal;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class DetailJadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dj = DetailJadwal::all();
        return view('detailjadwal.index', compact('dj'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dj = DetailJadwal::all();
        $jadwal = Jadwal::all();
        return view('detailjadwal.create', compact('dj', 'jadwal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dj = new DetailJadwal();
        $dj->album = $request['album'];
        $dj->medsos = $request['medsos'];
        $dj->jam_ready = $request['jam_ready'];
        $dj->rundown = $request['rundown'];
        $dj->keterangan = $request['keterangan'];
        $dj->id_jadwal = $request['id_jadwal'];
        $dj->save();

        return redirect('detailjadwal');
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
        $dj = DetailJadwal::find($id);
        return view('detailjadwal.edit', compact('dj'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dj = DetailJadwal::find($id);
        $dj->album = $request['album'];
        $dj->medsos = $request['medsos'];
        $dj->jam_ready = $request['jam_ready'];
        $dj->rundown = $request['rundown'];
        $dj->keterangan = $request['keterangan'];
        $dj->id_jadwal = $request['id_jadwal'];
        $dj->save();

        return redirect('detailjadwal');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dj = DetailJadwal::find($id);
        $dj->delete();
        return redirect('detailjadwal');
    }
}