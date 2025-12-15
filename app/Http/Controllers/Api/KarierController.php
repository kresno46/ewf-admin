<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Karier;
use Illuminate\Http\Request;

class KarierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kariers = Karier::select([
            'id',
            'nama_kota',
            'posisi',
            'slug',
            'responsibilities',
            'requirements',
            'email',
            'created_at',
            'updated_at'
        ])->latest()->get();

        return response()->json([
            'success' => true,
            'data' => $kariers
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $karier = Karier::where('slug', $slug)->firstOrFail();

        return response()->json([
            'success' => true,
            'data' => $karier
        ]);
    }
}
