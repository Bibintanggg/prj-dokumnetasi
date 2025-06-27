<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tahap;

class TahapDokumentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tahaps = Tahap::where('user_id', Auth::id())->get();
        return view ('user.dokumentasi.index', compact('tahaps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' => 'required|string|max:240'
        ]);

        Tahap::create([
            'nama' => $request->nama,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('succes', 'Bulan berhasil ditambahkan!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
