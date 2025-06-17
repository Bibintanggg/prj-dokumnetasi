<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumentasi;
use Illuminate\Support\Facades\Auth;

class DokumentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dokumentasis = Dokumentasi::where('user_id', Auth::user())->get();
        return view('user.dokumentasi.index', compact('dokumentasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user.dokumentasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $request->validate([
            'judul'=>'required|string|max:60',
            'kegiatan'=>'required|string|max:60',
            'kendala'=>'required|in:ada,tidak ada',
        ]);

        Dokumentasi::create([
            'judul'=>$request->judul,
            'kegiatan'=>$request->kegiatan,
            'kendala'=>$request->kendala,
            'user_id' => auth()->id(),
        ]);

        return redirect()->back()->with('succes', 'Dokmentasi berhasil ditambahkan!');
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
        $dokumentasis = Dokumentasi::where('id', $id)->where('user_id', auth()->id()->firstOrFail());
        return view('.user.dokumentasi.edit', compact('dokumentasis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'judul'=>'required|string|max:60',
            'kegiatan'=>'required|string|max:60',
            'kendala'=>'required|in:ada,tidak ada',
        ]);

        $dokumentasis = Dokumentasi::findOrFail($id);
        $dokumentasis -> update(attributes: $request->all());
        return redirect()->back()->with('succes', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $dokumentasis = Dokumentasi::findOrFail($id);
        $dokumentasis->delete();
        return redirect()->back()->with('succes', 'Data berhasil dihapus!');
    }
}
