<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function admin()
    {
        return view('admin.profile', [
            'user' => Auth::user()
        ]);
    }
}
