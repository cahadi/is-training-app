<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $subjects = Subject::all();
        return view('frontend.lectures', compact('subjects'));
    }
}
