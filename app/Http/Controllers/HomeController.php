<?php

namespace App\Http\Controllers;

use App\Models\Subject;

class HomeController extends Controller
{
    public function home()
    {
        $subjects = Subject::all();
        return view('frontend.pages.main', compact('subjects'));
    }
}
