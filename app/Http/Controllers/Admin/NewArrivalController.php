<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewArrival;
use Illuminate\Http\Request;

class NewArrivalController extends Controller
{
    public function index()
    {
        $newarrival = NewArrival::first();

        $stats = [
            'total' => NewArrival::count(),
        ];

        return view('admin.newarrival.create', compact('newarrival', 'stats'));
    }

    public function update(Request $request, $id)
    {
        $newarrival = NewArrival::findOrFail($id);

        $request->validate([
            'title'       => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Upload Image
        if ($request->hasFile('image')) {

            // Delete old image
            if ($newarrival->image && file_exists(public_path($newarrival->image))) {
                unlink(public_path($newarrival->image));
            }

            $image = $request->file('image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads/newarrival'), $imageName);

            $newarrival->image = 'uploads/newarrival/' . $imageName;
        }

        $newarrival->title = $request->title;
        $newarrival->description = $request->description;

        $newarrival->save();

        return redirect()->back()->with('success', 'New Arrival updated successfully.');
    }
}