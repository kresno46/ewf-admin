<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebsiteProfile;

class ProfileWebsiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $profile = WebsiteProfile::first();
        return view('profile-website.index', compact('profile'));
    }

    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'website_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'map_link' => 'nullable|url|max:1000',
            'complaint_link' => 'nullable|url|max:1000',
            'phone' => 'nullable|string|max:50',
            'fax' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
        ]);

        WebsiteProfile::updateOrCreate(
            ['id' => optional(WebsiteProfile::first())->id ?? 1],
            $request->only([
                'website_name',
                'description',
                'address',
                'map_link',
                'complaint_link',
                'phone',
                'fax',
                'email',
            ])
        );

        return redirect()->back()->with('success', 'Pengaturan website berhasil disimpan.');
    }

    public function destroy($id)
    {
        $profile = WebsiteProfile::findOrFail($id);
        $profile->delete();

        return redirect()->back()->with('success', 'Pengaturan website berhasil dihapus.');
    }
}
