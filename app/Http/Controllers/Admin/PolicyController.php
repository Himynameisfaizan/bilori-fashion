<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Policy;

class PolicyController extends Controller
{
    public function index()
    {
        $policy = Policy::first();
        return view('admin.policy.edit', compact('policy'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'privacy_policy'          => 'nullable|string',
            'terms_of_service'        => 'nullable|string',
            'shipping_policy'         => 'nullable|string',
            'return_exchange_policy'  => 'nullable|string',
            'return_exchange_request' => 'nullable|string',
        ]);

        // Agar database me pehle se record nahi hoga, to naya object banayega
        $policy = Policy::first() ?? new Policy();
        
        $policy->fill($request->only([
            'privacy_policy', 
            'terms_of_service', 
            'shipping_policy', 
            'return_exchange_policy',
            'return_exchange_request'
        ]))->save();

        return redirect()->back()->with('success', 'Policies updated successfully!');
    }
}