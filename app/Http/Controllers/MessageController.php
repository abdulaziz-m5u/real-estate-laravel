<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;
use App\Models\Message;

class MessageController extends Controller
{
    public function store(MessageRequest $request)
    {
        Message::create($request->validated());

        return redirect()->back()->with([
            'message' => 'your message success send'
        ]);
    }
}
