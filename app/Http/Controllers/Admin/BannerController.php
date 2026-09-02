<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('order')->paginate(10);

        $stats = [
            'total' => Banner::count(),
            'active' => Banner::where('status', 1)->count(),
            'inactive' => Banner::where('status', 0)->count(),
            'expired' => Banner::where('end_date', '<', now())->count()
        ];

        return view('admin.banners.index', compact('banners', 'stats'));
    }

    public function create()
    {
        $positions = [
            'home_top',
            'home_middle',
            'home_bottom',
            'sidebar',
            'category_page',
            'product_page'
        ];

        return view('admin.banners.create', compact('positions'));
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'nullable|string|max:255',
        'subtitle' => 'nullable|string|max:500',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:20480', // Made required
        'link' => 'nullable|url',
        'button_text' => 'nullable|string|max:50',
        'position' => 'required|string|max:50',
        'order' => 'nullable|integer|min:0',
        'status' => 'required|in:0,1',
        'device_type' => 'nullable|in:mobile,laptop',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date|after:start_date',
        'target' => 'nullable|in:_self,_blank',
        'background_color' => 'nullable|string|max:7',
        'text_color' => 'nullable|string|max:7',
        'button_color' => 'nullable|string|max:7'
    ]);

    $data = $request->except('_token');
    
    // Set default status if not provided
    if (!isset($data['status'])) {
        $data['status'] = 1;
    }

    // IMAGE UPLOAD
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads/banners'), $imageName);
        $data['image'] = 'uploads/banners/' . $imageName;
    }

    Banner::create($data);

    return redirect()
        ->route('admin.banners.index')
        ->with('success', 'Banner created successfully!');
}

public function update(Request $request, $id)
{
    $banner = Banner::findOrFail($id);

    $request->validate([
        'title' => 'nullable|string|max:255',
        'subtitle' => 'nullable|string|max:500',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
        'link' => 'nullable|url',
        'button_text' => 'nullable|string|max:50',
        'position' => 'required|string|max:50',
        'order' => 'nullable|integer|min:0',
        'status' => 'required|in:0,1', // Changed from active/inactive to 0/1
        'device_type' => 'nullable|in:mobile,laptop',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date|after:start_date',
        'target' => 'nullable|in:_self,_blank',
        'background_color' => 'nullable|string|max:7',
        'text_color' => 'nullable|string|max:7',
        'button_color' => 'nullable|string|max:7'
    ]);

    $data = $request->except(['_token', '_method']);

    // REMOVE IMAGE
    if ($request->has('remove_image') && $request->remove_image == 1) {
        if ($banner->image && file_exists(public_path($banner->image))) {
            unlink(public_path($banner->image));
        }
        $data['image'] = null;
    }

    // NEW IMAGE UPLOAD
    if ($request->hasFile('image')) {
        // DELETE OLD IMAGE
        if ($banner->image && file_exists(public_path($banner->image))) {
            unlink(public_path($banner->image));
        }

        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads/banners'), $imageName);
        $data['image'] = 'uploads/banners/' . $imageName;
    }

    // Remove remove_image from data array
    unset($data['remove_image']);

    $banner->update($data);

    return redirect()
        ->route('admin.banners.index')
        ->with('success', 'Banner updated successfully!');
}

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);

        $positions = [
            'home_top',
            'home_middle',
            'home_bottom',
            'sidebar',
            'category_page',
            'product_page'
        ];

        return view('admin.banners.edit', compact('banner', 'positions'));
    }

    // public function update(Request $request, $id)
    // {
    //     $banner = Banner::findOrFail($id);

    //     $request->validate([
    //         'title' => 'nullable|string|max:255',

    //         'subtitle' => 'nullable|string|max:500',

    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:20480',

    //         'link' => 'nullable|url',

    //         'button_text' => 'nullable|string|max:50',

    //         'position' => 'required|string|max:50',

    //         'order' => 'nullable|integer|min:0',

    //         'status' => 'required|in:0,1',

    //         'device_type' => 'nullable|in:mobile,laptop',

    //         'start_date' => 'nullable|date',

    //         'end_date' => 'nullable|date|after:start_date',

    //         'target' => 'nullable|in:_self,_blank',

    //         'background_color' => 'nullable|string|max:7',

    //         'text_color' => 'nullable|string|max:7',

    //         'button_color' => 'nullable|string|max:7'
    //     ]);

    //     $data = $request->all();

    //     // REMOVE IMAGE
    //     if ($request->remove_image == 1) {

    //         if ($banner->image && file_exists(public_path($banner->image))) {

    //             unlink(public_path($banner->image));
    //         }

    //         $data['image'] = null;
    //     }

    //     // NEW IMAGE UPLOAD
    //     if ($request->hasFile('image')) {

    //         // DELETE OLD IMAGE
    //         if ($banner->image && file_exists(public_path($banner->image))) {

    //             unlink(public_path($banner->image));
    //         }

    //         $image = $request->file('image');

    //         $imageName = time() . '_' . $image->getClientOriginalName();

    //         $image->move(public_path('uploads/banners'), $imageName);

    //         $data['image'] = 'uploads/banners/' . $imageName;
    //     }

    //     $banner->update($data);

    //     return redirect()
    //         ->route('admin.banners.index')
    //         ->with('success', 'Banner updated successfully!');
    // }

    public function destroy($id)
    {
        try {

            $banner = Banner::findOrFail($id);

            // DELETE IMAGE
            if ($banner->image && file_exists(public_path($banner->image))) {

                unlink(public_path($banner->image));
            }

            $banner->delete();

            return redirect()
                ->route('admin.banners.index')
                ->with('success', 'Banner deleted successfully!');

        } catch (\Exception $e) {

            return redirect()
                ->route('admin.banners.index')
                ->with('error', 'Error deleting banner: ' . $e->getMessage());
        }
    }

    public function updateStatus(Request $request, $id)
    {
        try {

            $request->validate([
                'status' => 'required|in:0,1'
            ]);

            $banner = Banner::findOrFail($id);

            $banner->update([
                'status' => $request->status
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Status updated successfully'
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function updateOrder(Request $request)
    {
        try {

            // SINGLE ORDER UPDATE
            if ($request->has('id') && $request->has('order')) {

                $banner = Banner::findOrFail($request->id);

                $banner->update([
                    'order' => $request->order
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Order updated successfully'
                ]);
            }

            // BULK ORDER UPDATE
            if ($request->has('orders')) {

                foreach ($request->orders as $order) {

                    Banner::where('id', $order['id'])->update([
                        'order' => $order['position']
                    ]);
                }

                return response()->json([
                    'success' => true,
                    'message' => 'Orders updated successfully'
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Invalid request'
            ], 400);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}