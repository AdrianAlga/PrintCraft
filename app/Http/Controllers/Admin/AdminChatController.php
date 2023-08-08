<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminChatController extends Controller
{
    public function index()
    {
        // $users = User::where('level', 1)->get();
        $users = User::where('level', 1)
                ->whereHas('sent_chats', function ($query) {
                    $query->where('id', '>', 0);
                })
                ->latest()->get();
        $chats = Chat::oldest()->get();
        return view("admin.notification.index", [
            "title" => "Notification",
            "users" => $users,
            "chats" => $chats,
        ]);
    }

    public function sendChat(Request $request) {
        $validated = $request->validate([
            "message" => "required|string",
            "recipient_id" => "required|exists:users,id",
        ]);
        $validated['sender_id'] = auth()->user()->id;
        Chat::create($validated);
        return back()->with('success', "Pesan Balasan berhasil terkirim");
    }
}
