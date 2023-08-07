<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Message;

class AdminMessageController extends Controller
{
    public function index() {
        return view('admin.message.index', [
            "title" => "Message",
            "messages" => Message::all(),
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            "message" => "required|string",
        ]);
        Message::create($validated);
        return redirect()->route("admin.message")->with('success', "Pesan Berhasil ditambahkan");

    }

    public function destroy(Message $message) {
        $message->delete();
        return redirect()->route("admin.message")->with('success', "Pesan Berhasil dihapus");
    }
}
