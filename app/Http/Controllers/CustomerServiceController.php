<?php

namespace App\Http\Controllers;

use App\Models\CustomerService;
use Illuminate\Http\Request;

class CustomerServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cs = CustomerService::all();
        return view('customerservice.index', compact('cs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cs = CustomerService::all();
        return view('customerservice.create', compact('cs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cs = new CustomerService();
        $cs->nama = $request['nama'];
        $cs->nomor_hp = $request['nomor_hp'];
        $cs->status = $request['status'];
        $cs->save();

        return redirect('customerservice');
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
        $cs = CustomerService::find($id);
        return view('customerservice.edit', compact('cs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cs = CustomerService::find($id);
        $cs->nama = $request['nama'];
        $cs->nomor_hp = $request['nomor_hp'];
        $cs->status = $request['status'];
        $cs->save();

        return redirect('customerservice');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cs = CustomerService::find($id);
        $cs->delete();
        return redirect('customerservice');
    }
}
