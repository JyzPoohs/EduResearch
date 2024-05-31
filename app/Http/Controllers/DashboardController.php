<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $registrations = Registration::with('event', 'user')->get();
        return view('dashboard.index', compact('registrations'));
    }
}
