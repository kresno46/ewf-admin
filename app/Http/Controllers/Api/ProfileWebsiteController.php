<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WebsiteProfile;

class ProfileWebsiteController extends Controller
{
    public function index()
    {
        $profile = WebsiteProfile::first();

        if (!$profile) {
            return response()->json([
                'success' => true,
                'data' => null,
                'message' => 'Data profile website belum tersedia.',
            ], 200);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'website_name' => $profile->website_name,
                'description' => $profile->description,
                'address' => $profile->address,
                'map_link' => $profile->map_link,
                'complaint_link' => $profile->complaint_link,
                'phone' => $profile->phone,
                'fax' => $profile->fax,
                'email' => $profile->email,
                'updated_at' => $profile->updated_at,
            ],
        ], 200);
    }
}
