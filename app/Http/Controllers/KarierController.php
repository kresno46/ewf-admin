<?php

namespace App\Http\Controllers;

use App\Models\Karier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KarierController extends Controller
{
    public function index()
    {
        $lowongans = Karier::latest()->paginate(10);
        return view('karier.index', compact('lowongans'));
    }

    public function create()
    {
        return view('karier.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kota' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'persyaratan' => 'required|string',
            'email' => 'required|email|max:255',
        ]);

        // Ubah nama field untuk disesuaikan dengan database
        $data = [
            'nama_kota' => $validated['nama_kota'],
            'posisi' => $validated['posisi'],
            'responsibilities' => $validated['deskripsi'],
            'requirements' => $validated['persyaratan'],
            'email' => $validated['email'],
        ];

        Karier::create($data);

        return redirect()->route('karier.index')
            ->with('success', 'Lowongan kerja berhasil ditambahkan');
    }

    public function show(Karier $karier)
    {
        return view('karier.show', compact('karier'));
    }

    public function edit($id)
    {
        $lowongan = Karier::findOrFail($id);
        return view('karier.edit', compact('lowongan'));
    }

    public function update(Request $request, Karier $karier)
    {
        $validated = $request->validate([
            'nama_kota' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'persyaratan' => 'required|string',
            'email' => 'required|email|max:255',
            'status' => 'boolean',
        ]);

        // Ubah nama field untuk disesuaikan dengan database
        $data = [
            'nama_kota' => $validated['nama_kota'],
            'posisi' => $validated['posisi'],
            'responsibilities' => $validated['deskripsi'],
            'requirements' => $validated['persyaratan'],
            'email' => $validated['email'],
            'status' => $request->has('status'),
        ];

        $karier->update($data);

        return redirect()->route('karier.index')
            ->with('success', 'Lowongan kerja berhasil diperbarui');
    }

    public function destroy(Karier $karier)
    {
        $karier->delete();

        return redirect()->route('karier.index')
            ->with('success', 'Lowongan kerja berhasil dihapus');
    }
}
