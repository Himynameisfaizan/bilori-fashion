<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'description' => 'nullable|string|max:500',
            'parent_id' => 'nullable|exists:categories,id',
           'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_key' => 'nullable|string|max:255',
            'meta_desc' => 'nullable|string|max:500',
        ]);

        $cate_id = random_int(100000, 999999);

        // ✅ Handle image upload - Direct to public folder
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/categories'), $imageName);
            $imagePath = 'uploads/categories/' . $imageName;
        }

        // Auto-generate slug if not provided or if it's empty
        $slug = $request->slug;
        if (empty($slug)) {
            $slug = Str::slug($request->name);

            // Check if slug already exists and make it unique
            $count = Category::where('slug', $slug)->count();
            if ($count > 0) {
                $slug = $slug . '-' . ($count + 1);
            }
        }

        Category::create([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'cate_id' => $cate_id,
            'parent_id' => $request->parent_id,
            'image' => $imagePath,
            'meta_title' => $request->meta_title,
            'meta_key' => $request->meta_key,
            'meta_desc' => $request->meta_desc,
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Category created successfully!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $id,
            'description' => 'nullable|string|max:500',
            'parent_id' => 'nullable|exists:categories,id',
           'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'remove_image' => 'nullable|boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_key' => 'nullable|string|max:255',
            'meta_desc' => 'nullable|string|max:500',
        ]);

        $data = $request->except(['image', 'remove_image']);

        // ✅ Handle image upload - Direct to public folder
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($category->image && file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/categories'), $imageName);
            $data['image'] = 'uploads/categories/' . $imageName;
        }

        // ✅ Handle image removal
        if ($request->has('remove_image') && $request->remove_image == 1) {
            if ($category->image && file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }
            $data['image'] = null;
        }

        // Auto-generate slug if empty
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($request->name);
            $count = Category::where('slug', $data['slug'])->where('id', '!=', $id)->count();
            if ($count > 0) {
                $data['slug'] = $data['slug'] . '-' . ($count + 1);
            }
        }

        $category->update($data);

        return redirect()->route('admin.category.index')
            ->with('success', 'Category updated successfully!');
    }
public function destroy($id)
{
    $category = Category::findOrFail($id);

    // DELETE IMAGE
    if (!empty($category->image)) {
        $imagePath = public_path($category->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    $category->delete();

    return back()->with('success', 'Category Deleted Successfully');
}
}