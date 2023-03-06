<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index (Request $request)
    {
        $user = User::find(Auth::id());

        if ($user->role == ""){
            return view("");
        }
    }
}
