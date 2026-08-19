<?php

namespace App\Http\Controllers;

use App\Models\ProjectProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientProgressController extends Controller
{
    public function index()
    {
        $progresses = ProjectProgress::with(['stages.items'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        // Mengarah ke resources/views/pages/progres/index.blade.php
        return view('progres.index', compact('progresses'));
    }
}