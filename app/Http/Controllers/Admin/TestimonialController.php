<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
    /**
     * Display testimonials
     */
    public function index()
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')
            ->paginate(10);

        $stats = [
            'total' => Testimonial::count(),
            'active' => Testimonial::where('status', 'active')->count(),
            'inactive' => Testimonial::where('status', 'inactive')->count(),
        ];

        return view(
            'admin.testimonials.index',
            compact('testimonials', 'stats')
        );
    }

    /**
     * Create form
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store testimonial
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'review' => 'nullable|integer|min:1|max:5',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();

        // Upload image
        if ($request->hasFile('photo')) {

    $image = $request->file('photo');

    $imageName = time() . '.' . $image->getClientOriginalExtension();

    $image->move(public_path('uploads/testimonials'), $imageName);

    $data['photo'] = 'uploads/testimonials/' . $imageName;
}

        Testimonial::create($data);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial created successfully.');
    }

    /**
     * Edit form
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update testimonial
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'review' => 'nullable|integer|min:1|max:5',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->except(['_token', '_method']);

        // Upload new image
        if ($request->hasFile('photo')) {

    // delete old image
    if ($testimonial->photo && file_exists(public_path($testimonial->photo))) {

        unlink(public_path($testimonial->photo));
    }

    $image = $request->file('photo');

    $imageName = time() . '.' . $image->getClientOriginalExtension();

    $image->move(public_path('uploads/testimonials'), $imageName);

    $data['photo'] = 'uploads/testimonials/' . $imageName;
}

        $testimonial->update($data);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    /**
     * Delete testimonial
     */
    public function destroy(Testimonial $testimonial)
    {
        try {

           if ($testimonial->photo && file_exists(public_path($testimonial->photo))) {

    unlink(public_path($testimonial->photo));
}

            $testimonial->delete();

            return redirect()
                ->route('admin.testimonials.index')
                ->with('success', 'Testimonial deleted successfully.');

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Toggle status
     */
    public function toggleStatus(Testimonial $testimonial)
    {
        $newStatus = $testimonial->status == 'active'
            ? 'inactive'
            : 'active';

        $testimonial->update([
            'status' => $newStatus
        ]);

        return response()->json([
            'success' => true,
            'status' => $newStatus
        ]);
    }
}