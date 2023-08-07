<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class UserInboxController extends Controller
{
    public function index() {
        return view('users.inbox', [
            "title" => "Title",
            "messages" => Message::all(),
        ]);
    }
}
