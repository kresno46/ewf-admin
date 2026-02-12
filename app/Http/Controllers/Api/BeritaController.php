<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    // Menampilkan semua berita yang berstatus published
    public function index()
    {
        $berita = Berita::where('status', 'published')->latest()->get();

        $berita->transform(function ($item) {
            $item->image_url = $item->image ? asset('img/berita/' . $item->image) : null;
            return $item;
        });

        return response()->json($berita, 200);
    }

    // Menampilkan detail berita berdasarkan slug
    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->where('status', 'published')->first();

        if (!$berita) {
            return response()->json(['message' => 'Berita tidak ditemukan'], 404);
        }

        $berita->image_url = $berita->image ? asset('img/berita/' . $berita->image) : null;

        return response()->json($berita, 200);
    }
}
