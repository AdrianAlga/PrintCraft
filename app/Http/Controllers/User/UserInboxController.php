<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Message;
use Illuminate\Http\Request;

class UserInboxController extends Controller
{
    public function index()
    {
        return view('users.inbox', [
            "title" => "Title",
            "messages" => Message::all(),
            "chats" => Chat::where('sender_id', auth()->user()->id)
                    ->orWhere('recipient_id', auth()->user()->id)
                    ->oldest()
                    ->get(),
        ]);
    }

    public function chat(Request $request)
    {
        $validated = $request->validate([
            "message" => "required|string",
        ]);
        $validated["sender_id"] = auth()->user()->id;
        $validated["recipient_id"] = 1;
        Chat::create($validated);
        return back()->with('success', "Pesan berhasil di kirim");
    }
}
