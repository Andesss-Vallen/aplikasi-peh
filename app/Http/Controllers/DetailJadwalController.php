<?php

namespace App\Http\Controllers;

use App\Models\DetailJadwal;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            'id_jadwal' => 'required',
            'rundown_text' => 'nullable|string',
            'rundown_pdf' => 'nullable|file|mimes:pdf|max:2048', // Maksimal 2MB
            'album' => 'nullable|string',
            'medsos' => 'nullable|string',
            'jam_ready' => 'nullable|string',
            'keterangan' => 'nullable|string',
        ]);

        // Simpan file PDF jika ada
        $rundown_pdf = null;
        if ($request->hasFile('rundown_pdf')) {
            $rundown_pdf = $request->file('rundown_pdf')->store('rundown', 'public');
        }

        // Simpan data ke database
        DetailJadwal::create([
            'id_jadwal' => $request->id_jadwal,
            'rundown_text' => $request->rundown_text,
            'rundown_pdf' => $rundown_pdf,
            'album' => $request->album,
            'medsos' => $request->medsos,
            'jam_ready' => $request->jam_ready,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('detailjadwal.index')->with('success', 'Data berhasil ditambahkan!');
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
        $jadwal = Jadwal::all();
        return view('detailjadwal.edit', compact('dj', 'jadwal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dj = DetailJadwal::find($id);
        $dj->album = $request->album;
        $dj->medsos = $request->medsos;
        $dj->jam_ready = $request->jam_ready;
        $dj->rundown_text = $request->rundown_text;
        $dj->keterangan = $request->keterangan;
        $dj->id_jadwal = $request->id_jadwal;

        // Cek apakah ada file PDF baru yang diunggah
        if ($request->hasFile('rundown_pdf')) {
            // Hapus file lama jika ada
            if ($dj->rundown_pdf) {
                Storage::disk('public')->delete($dj->rundown_pdf);
            }

            // Simpan file baru
            $rundown_pdf = $request->file('rundown_pdf')->store('rundown', 'public');
            $dj->rundown_pdf = $rundown_pdf;
        }

        $dj->save();

        return redirect()->route('detailjadwal.index')->with('success', 'Data berhasil diperbarui!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dj = DetailJadwal::findOrFail($id);

        // Hapus file PDF jika ada
        if ($dj->rundown_pdf) {
            Storage::disk('public')->delete($dj->rundown_pdf);
        }

        // Hapus data dari database
        $dj->delete();

        return redirect()->route('detailjadwal.index')->with('success', 'Data dan file PDF berhasil dihapus!');
    }
}
