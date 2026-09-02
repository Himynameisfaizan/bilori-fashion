<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of gallery images.
     */
    public function index()
    {
        $images = Gallery::latest()->paginate(12);
        $stats = [
            'total' => Gallery::count(),
            'recent' => Gallery::where('created_at', '>=', now()->subDays(7))->count()
        ];

        return view('admin.gallery.index', compact('images', 'stats'));
    }

    /**
     * Show the form for creating a new gallery image.
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created gallery image.
     */
    public function store(Request $request)
    {
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'image_name' => 'nullable|string|max:255'
        ]);

        $uploadedImages = [];

        foreach ($request->file('images') as $image) {
            $imagePath = $image->store('gallery', 'public');

            $gallery = Gallery::create([
                'image_name' => $request->image_name ?: pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),
                'image_path' => $imagePath,
            ]);

            $uploadedImages[] = $gallery;
        }

        if (count($uploadedImages) === 1) {
            return redirect()->route('admin.gallery.index')
                ->with('success', 'Image uploaded successfully!');
        } else {
            return redirect()->route('admin.gallery.index')
                ->with('success', count($uploadedImages) . ' images uploaded successfully!');
        }
    }

    /**
     * Display the specified gallery image.
     */
    public function show($id)
    {
        $image = Gallery::findOrFail($id);
        return view('admin.gallery.show', compact('image'));
    }

    /**
     * Show the form for editing the specified gallery image.
     */
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified gallery image.
     */
    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'image_name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $data = $request->only(['image_name']);

        // Handle image update
        if ($request->hasFile('image')) {
            // Delete old image
            if ($gallery->image_path && \Storage::exists('public/' . $gallery->image_path)) {
                \Storage::delete('public/' . $gallery->image_path);
            }

            $data['image_path'] = $request->file('image')->store('gallery', 'public');
        }

        $gallery->update($data);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Image updated successfully!');
    }

    /**
     * Remove the specified gallery image.
     */
    public function destroy($id)
    {
        try {
            $gallery = Gallery::findOrFail($id);

            // Delete physical file
            if ($gallery->image_path && \Storage::exists('public/' . $gallery->image_path)) {
                \Storage::delete('public/' . $gallery->image_path);
            }

            $gallery->delete();

            return redirect()->route('admin.gallery.index')
                ->with('success', 'Image deleted successfully!');

        } catch (\Exception $e) {
            return redirect()->route('admin.gallery.index')
                ->with('error', 'Error deleting image: ' . $e->getMessage());
        }
    }

    /**
     * Bulk delete gallery images.
     */
    public function bulkDelete(Request $request)
    {
        $request->validate([
            'image_ids' => 'required|array',
            'image_ids.*' => 'exists:gallery,id'
        ]);

        try {
            $images = Gallery::whereIn('id', $request->image_ids)->get();

            foreach ($images as $image) {
                // Delete physical file
                if ($image->image_path && \Storage::exists('public/' . $image->image_path)) {
                    \Storage::delete('public/' . $image->image_path);
                }
                $image->delete();
            }

            return redirect()->route('admin.gallery.index')
                ->with('success', count($images) . ' images deleted successfully!');

        } catch (\Exception $e) {
            return redirect()->route('admin.gallery.index')
                ->with('error', 'Error deleting images: ' . $e->getMessage());
        }
    }
}