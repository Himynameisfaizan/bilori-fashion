<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function index()
    {
        $subscribers = Newsletter::where('status', 'subscribed')
            ->latest()
            ->paginate(15);

        $stats = [
            'total' => Newsletter::count(),
            'active' => Newsletter::where('status', 'subscribed')->count(),
            'unsubscribed' => Newsletter::where('status', 'unsubscribed')->count()
        ];

        return view('admin.newsletter.index', compact('subscribers', 'stats'));
    }

    public function sendCampaign(Request $request)
    {
        $request->validate([
            'subject' => 'required|string',
            'content' => 'required|string'
        ]);

        $subscribers = Newsletter::where('status', 'subscribed')->get();

        foreach ($subscribers as $subscriber) {
            // Send email logic here
            // Mail::to($subscriber->email)->send(new NewsletterCampaign($request->subject, $request->content));
        }

        return redirect()->back()->with('success', 'Campaign sent to ' . $subscribers->count() . ' subscribers!');
    }

    public function export()
    {
        $subscribers = Newsletter::where('status', 'subscribed')->get();

        $csv = \League\Csv\Writer::new();
        $csv->insertOne(['Email', 'Subscribed Date']);

        foreach ($subscribers as $subscriber) {
            $csv->insertOne([$subscriber->email, $subscriber->subscribed_at]);
        }

        return response((string) $csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="newsletter-subscribers.csv"',
        ]);
    }

    public function destroy($id)
    {
        $subscriber = Newsletter::findOrFail($id);
        $subscriber->delete();

        return redirect()->back()->with('success', 'Subscriber removed successfully!');
    }
}