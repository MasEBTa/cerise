<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{
    public function checkToken(Request $request)
    {
        if ($request->user() || Auth::guard('sanctum')->check()) {
            // Token otentikasi masih valid
            return response()->json(['message' => 'Token is valid.', 'status' => 'success'], 200);
        } else {
            // Token otentikasi tidak valid atau tidak ada
            return response()->json(['message' => 'Token is invalid or not present.'], 401);
        }
    }
}
