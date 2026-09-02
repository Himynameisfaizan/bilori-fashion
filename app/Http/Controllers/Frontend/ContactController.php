<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Show contact page with company info.
     */
    public function index()
    {
        // Get company contact information from database
        $companyInfo = Contact::first();

        return view('/contact', compact('companyInfo'));
    }

    /**
     * Submit contact form.
     */
    public function submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'number' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Save to database (if you have a contact_messages table)
        // ContactMessage::create([
        //     'first_name' => $request->firstname,
        //     'last_name' => $request->lastname,
        //     'phone' => $request->number,
        //     'email' => $request->email,
        //     'message' => $request->message,
        // ]);

        // You can also send email notification here

        return response()->json([
            'success' => true,
            'message' => 'Thank you for contacting us! We will get back to you soon.'
        ]);
    }
}