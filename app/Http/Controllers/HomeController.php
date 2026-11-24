<?php

namespace App\Http\Controllers;

use App\Models\Item;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'totalFound'    => Item::count(),
            'totalReturned' => Item::where('status', 'sudah_dikembalikan')->count(),
            'latest'        => Item::with('category')->latest('found_at')->take(3)->get(),
        ]);
    }
}