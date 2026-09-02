<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialMedia;

class SocialMediaController extends Controller
{
    /**
     * Display Social Media Page
     */
    public function index()
    {
        $social = SocialMedia::first();

        return view('admin.social-media.index', compact('social'));
    }

    /**
     * Update Social Media Links
     */
    public function update(Request $request)
    {
        $request->validate([
            'facebook'  => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter'   => 'nullable|url',
            'youtube'   => 'nullable|url',
            'linkedin'  => 'nullable|url',
        ]);

        SocialMedia::updateOrCreate(
            ['id' => 1],
            [
                'facebook'  => $request->facebook,
                'instagram' => $request->instagram,
                'twitter'   => $request->twitter,
                'youtube'   => $request->youtube,
                'linkedin'  => $request->linkedin,
            ]
        );

        return redirect()
            ->back()
            ->with('success', 'Social media links updated successfully.');
    }
}