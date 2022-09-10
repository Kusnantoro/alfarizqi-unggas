<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'total' => Point::count(),
            'tukar' => Point::where('status', 'TUKAR')->count(),
            'belum' => Point::where('status', 'BELUM')->count(),
            'baru' => Point::where('status')->count()
        ]);
    }
}
