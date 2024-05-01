<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matkul;
use Illuminate\Validation\Rule;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matkul = Matkul::orderBy('created_at', 'DESC')->get();

        return view('matkuls.index', compact('matkul'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $matkuls = Matkul::all(); // atau gunakan query yang sesuai untuk mengambil data matakuliah
        return view('matkuls.create')->with('matkuls', $matkuls);
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'sks' => 'required|numeric',
        ], [
            'sks.required' => 'SKS harus diisi.',
            'sks.numeric' => 'SKS harus berupa angka.',
        ]);

        Matkul::create($request->all());

        return redirect()->route('admin/matkuls')->with('success', 'Matkul added successfully');
    }



    public function show(string $id_matkul)
    {
        $matkul = Matkul::findOrFail($id_matkul);

        return view('matkuls.show', compact('matkul'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_matkul)
    {
        $matkul = Matkul::findOrFail($id_matkul);

        return view('matkuls.edit', compact('matkul'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_matkul)
    {
        $matkul = Matkul::findOrFail($id_matkul);

        $matkul->update($request->all());

        return redirect()->route('admin/matkuls')->with('success', 'matkul updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_matkul)
    {
        $matkul = Matkul::findOrFail($id_matkul);

        $matkul->delete();

        return redirect()->route('admin/matkuls')->with('success', 'matkul deleted successfully');
    }
}
