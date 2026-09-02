<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminNotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = AdminNotification::latest()->paginate(20);
        $unreadCount = AdminNotification::where('is_read', false)->count();

        return view('admin.notifications.index', compact('notifications', 'unreadCount'));
    }

    public function all()
    {
        $notifications = AdminNotification::latest()->get();
        $unreadCount = AdminNotification::where('is_read', false)->count();

        return response()->json([
            'count' => $unreadCount,
            'notifications' => $notifications->map(function ($notification) {
                return [
                    'id' => $notification->id,
                    'title' => $notification->title,
                    'message' => $notification->message,
                    'icon' => $notification->icon,
                    'url' => $notification->link,
                    'time' => $notification->created_at->diffForHumans(),
                    'is_read' => $notification->is_read
                ];
            })
        ]);
    }

    public function markAsRead($id)
    {
        $notification = AdminNotification::findOrFail($id);
        $notification->markAsRead();

        return response()->json(['success' => true]);
    }

    public function markAllAsRead()
    {
        AdminNotification::where('is_read', false)->update(['is_read' => true]);

        return redirect()->route('admin.notifications')
            ->with('success', 'All notifications marked as read!');
    }

    public function destroy($id)
    {
        $notification = AdminNotification::findOrFail($id);
        $notification->delete();

        return redirect()->route('admin.notifications')
            ->with('success', 'Notification deleted successfully!');
    }

    public static function createNotification($type, $title, $message, $link = null, $icon = null)
    {
        AdminNotification::create([
            'type' => $type,
            'title' => $title,
            'message' => $message,
            'link' => $link,
            'icon' => $icon ?? 'fas fa-bell',
            'is_read' => false
        ]);
    }
}