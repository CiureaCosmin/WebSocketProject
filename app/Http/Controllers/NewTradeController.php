<?php

namespace App\Http\Controllers;

use App\Events\NewTrade;
use Illuminate\Http\Request;

class NewTradeController extends Controller
{
    public function create(Request $request)
    {
        $message = $request->input('message');
        event(new NewTrade($message));
        return response()->json(['success' => true, 'message' => $message]);
    }
}
