<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubscriberRequest;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    public function store(SubscriberRequest $request)
    {
        Subscriber::create($request->validated());

        return redirect()->back()->with([
            'message' => 'Thanks for subscribe'
        ]);
    }
}
