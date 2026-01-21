<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $data = [
        'email' => 'mamad@gmail.com',
        'no_hp' => '081234567890',
        'alamat' => 'Kudus',
    ];
    return view('kontak', $data, ['title' => "Contact"]);
    }
}
