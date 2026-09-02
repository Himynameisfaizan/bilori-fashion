<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display company contact information.
     */
    public function index()
    {
        $companyInfo = Contact::first();
        return view('admin.contacts.index', compact('companyInfo'));
    }

    /**
     * Show form to create company contact information.
     */
    public function create()
    {
        return view('admin.contacts.create');
    }

    /**
     * Store company contact information.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:100',
            'email' => 'nullable|email|max:100',
            'email2' => 'nullable|email|max:255',
            'company_name' => 'nullable|string|max:255',
            'copyright' => 'nullable|string|max:255',
            'working_hours' => 'nullable|string|max:100',
            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'linkdin' => 'nullable|url|max:2000',
            'map' => 'nullable|string|max:500',
            'address' => 'nullable|string|max:255',
            'address2' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'wp_number' => 'nullable|string|max:11',
            'telephone' => 'nullable|string|max:11',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $data = $request->all();
            $data['created_at'] = now();
            $data['updated_at'] = now()->format('Y-m-d H:i:s');

            Contact::create($data);

            return redirect()->route('admin.contacts.index')
                ->with('success', 'Company contact information created successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error creating information: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show form to edit company contact information.
     */
    public function edit($id)
    {
        $companyInfo = Contact::findOrFail($id);
        return view('admin.contacts.edit', compact('companyInfo'));
    }

    /**
     * Update company contact information.
     */
    public function update(Request $request, $id)
    {
        $companyInfo = Contact::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:100',
            'email' => 'nullable|email|max:100',
            'email2' => 'nullable|email|max:255',
            'company_name' => 'nullable|string|max:255',
            'copyright' => 'nullable|string|max:255',
            'working_hours' => 'nullable|string|max:100',
            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'linkdin' => 'nullable|url|max:2000',
            'map' => 'nullable|string|max:500',
            'address' => 'nullable|string|max:255',
            'address2' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'wp_number' => 'nullable|string|max:11',
            'telephone' => 'nullable|string|max:11',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $data = $request->all();
            $data['updated_at'] = now()->format('Y-m-d H:i:s');

            $companyInfo->update($data);

            return redirect()->route('admin.contacts.index')
                ->with('success', 'Company contact information updated successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error updating information: ' . $e->getMessage())
                ->withInput();
        }
    }
}