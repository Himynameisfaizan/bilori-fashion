<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About; // Make sure your model name matches your database table
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display the About page edit form.
     */
    public function index()
    {
        // Fetches the single configuration row out of your database table
        $about = About::first(); 
        
        // This targets resources/views/admin/about/edit.blade.php
        return view('admin.about.edit', compact('about')); 
    }

    /**
     * Handle adding or updating the About details.
     */
  public function update(Request $request)
{
    // 1. Validation me 'webp' ko safe rakhne ke liye check badla
    $request->validate([
        'title'             => 'required|string|max:255',
        'short_description' => 'nullable|string',
        'description'       => 'required|string',
        'image'             => 'nullable|file|max:2048', // file check lagaya taaki webp block na ho
    ]);

    $about = About::first() ?? new About();
    $data = $request->only(['title', 'short_description', 'description', 'meta_title', 'meta_description', 'meta_keywords']);

    if ($request->hasFile('image')) {
        
        // Sabsay pehle check karein ki public folder me 'about' naam ka folder hai ya nahi, nahi toh banayein
        $destinationPath = public_path('about');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Purani file delete karne ke liye
        if (!empty($about->image) && file_exists(public_path($about->image))) {
            @unlink(public_path($about->image));
        }
        
        // Naya unique naam aur extension extract karein
        $extension = $request->file('image')->getClientOriginalExtension();
        // Agar extension khali miley toh webp force karein
        if(empty($extension)) {
            $extension = 'webp';
        }
        
        $imageName = 'about/' . time() . '.' . $extension;
        
        // Direct public/about folder me upload/move karein
        $request->file('image')->move($destinationPath, str_replace('about/', '', $imageName));
        
        $data['image'] = $imageName;
    }

    $about->fill($data)->save();

    return redirect()->back()->with('success', 'About panel updated cleanly!');
}
}