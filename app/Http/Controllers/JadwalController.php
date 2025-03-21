<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\CustomerService;
use App\Models\TimFoto;
use App\Models\TimVideo;
use App\Models\Paket;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $j = Jadwal::all();
        return view('jadwal.index', compact('j'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $j = Jadwal::all();
        $cs = CustomerService::all();
        $tf = TimFoto::all();
        $tv = TimVideo::all();
        $p = Paket::all();
        return view('jadwal.create', compact('j', 'cs', 'tf', 'tv', 'p'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $j = new Jadwal();
        $j->client = $request['client'];
        $j->brand = $request['brand'];
        $j->tanggal = $request['tanggal'];
        $j->bvia_foto = $request['bvia_foto'];
        $j->bvia_video = $request['bvia_video'];
        $j->keterangan = $request['keterangan'];
        $j->pakaian = $request['pakaian'];
        $j->id_cs = $request['id_cs'];
        $j->id_tfoto = $request['id_tfoto'];
        $j->id_tvideo = $request['id_tvideo'];
        $j->id_paket = $request['id_paket'];
        $j->save();

        if (is_array($request->id_tfoto)) {
            $j->timFoto()->sync($request->id_tfoto);
        } elseif (!empty($request->id_tfoto)) {
            $j->timFoto()->sync([$request->id_tfoto]);
        }

        // Cek apakah tim video memiliki banyak data atau hanya satu
        if (is_array($request->id_tvideo)) {
            $j->timVideo()->sync($request->id_tvideo);
        } elseif (!empty($request->id_tvideo)) {
            $j->timVideo()->sync([$request->id_tvideo]);
        }
        return redirect('jadwal');
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
        $j = Jadwal::find($id);
        $cs = CustomerService::all();
        $tf = TimFoto::all();
        $tv = TimVideo::all();
        $p = Paket::all();
        return view('jadwal.edit', compact('j', 'cs', 'tf', 'tv', 'p'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $j = Jadwal::findOrFail($id);
        $j->client = $request['client'];
        $j->brand = $request['brand'];
        $j->tanggal = $request['tanggal'];
        $j->bvia_foto = $request['bvia_foto'];
        $j->bvia_video = $request['bvia_video'];
        $j->keterangan = $request['keterangan'];
        $j->pakaian = $request['pakaian'];
        $j->id_cs = $request['id_cs'];
        $j->id_paket = $request['id_paket'];
        $j->save();

        if (is_array($request->id_tfoto)) {
            $j->timFoto()->sync($request->id_tfoto);
        } elseif (!empty($request->id_tfoto)) {
            $j->timFoto()->sync([$request->id_tfoto]);
        }

        // Cek apakah tim video memiliki banyak data atau hanya satu
        if (is_array($request->id_tvideo)) {
            $j->timVideo()->sync($request->id_tvideo);
        } elseif (!empty($request->id_tvideo)) {
            $j->timVideo()->sync([$request->id_tvideo]);
        }

        return redirect('jadwal');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $j = Jadwal::find($id);
        $j->delete();
        return redirect('jadwal');
    }
}
