<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PublicChat;

class PublicChatController extends Controller
{
    public function store(Request $request) {
        $request = $request->validate([
            'user_id' => 'required',
            'message' => 'required'
        ]);
        PublicChat::create($request);
        return redirect('/');
    }
}
