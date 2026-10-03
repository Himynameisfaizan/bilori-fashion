<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display the About page edit form.
     */
    public function index()
    {
        $about = About::first() ?? new About(); 
        
        return view('admin.about.edit', compact('about')); 
    }

    /**
     * Handle adding or updating the About details.
     */
  public function update(Request $request)
    {
        $request->validate([
            'title'             => 'required|string|max:255',
            'subtitle'          => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'description'       => 'required|string',
            'image'             => 'nullable|file|max:2048', 
            'gallery_images.*'  => 'nullable|file|max:2048',
            'vision_title'      => 'nullable|string',
            'vision_description'=> 'nullable|string',
            'vision_images.*'   => 'nullable|file|max:2048',
            'feature_title'     => 'nullable|string|max:255',
            'brand_stats' => 'nullable|array',
        ]);

        $about = About::first() ?? new About();
        
        $data = $request->only([
            'title', 'subtitle', 'short_description', 'description', 
            'vision_title', 'vision_description', 'feature_title',
            'meta_title', 'meta_description', 'meta_keywords',
            'brand_stats',
        ]);

        $destinationPath = public_path('about');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // 1. Main Featured Image
        if ($request->hasFile('image')) {
            if (!empty($about->image) && file_exists(public_path($about->image))) {
                @unlink(public_path($about->image));
            }
            $ext = $request->file('image')->getClientOriginalExtension() ?: 'webp';
            $imageName = 'about/' . time() . '.' . $ext;
            $request->file('image')->move($destinationPath, str_replace('about/', '', $imageName));
            $data['image'] = $imageName;
        }

        // 2. Handle Masonry Gallery Images (Keep, Remove, Add New)
        $gallery = [];
        if ($request->has('existing_gallery')) {
            $removeGallery = $request->input('remove_gallery', []);
            foreach ($request->existing_gallery as $index => $existingImg) {
                if (!in_array($index, $removeGallery)) {
                    $gallery[] = $existingImg; // Keep this image
                } else {
                    @unlink(public_path($existingImg)); // Delete from server
                }
            }
        }
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                $ext = $file->getClientOriginalExtension() ?: 'webp';
                $fileName = time() . '_' . uniqid() . '.' . $ext;
                $file->move($destinationPath, $fileName);
                $gallery[] = 'about/' . $fileName;
            }
        }
        $data['gallery_images'] = $gallery;

        // 3. Handle Vision Images (Keep, Remove, Add New)
        $visionImgs = [];
        if ($request->has('existing_vision')) {
            $removeVision = $request->input('remove_vision', []);
            foreach ($request->existing_vision as $index => $existingImg) {
                if (!in_array($index, $removeVision)) {
                    $visionImgs[] = $existingImg;
                } else {
                    @unlink(public_path($existingImg));
                }
            }
        }
        if ($request->hasFile('vision_images')) {
            foreach ($request->file('vision_images') as $file) {
                $ext = $file->getClientOriginalExtension() ?: 'webp';
                $fileName = time() . '_vision_' . uniqid() . '.' . $ext;
                $file->move($destinationPath, $fileName);
                $visionImgs[] = 'about/' . $fileName;
            }
        }
        $data['vision_images'] = $visionImgs;

        $about->fill($data)->save();

        return redirect()->back()->with('success', 'About page updated and images managed successfully!');
    }
}