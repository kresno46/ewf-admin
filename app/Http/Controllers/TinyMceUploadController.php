<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class TinyMceUploadController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $file = $request->file('file');
        $ext = strtolower($file->getClientOriginalExtension());
        $filename = Str::uuid() . '.' . $ext;

        $dir = public_path('img/uploads');
        if (!File::exists($dir)) {
            File::makeDirectory($dir, 0755, true);
        }

        $file->move($dir, $filename);

        return response()->json([
            'location' => url('img/uploads/' . $filename),
        ]);
    }
}
