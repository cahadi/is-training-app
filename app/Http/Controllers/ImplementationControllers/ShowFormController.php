<?php

namespace App\Http\Controllers\ImplementationControllers;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowFormController extends Controller
{
    public function showForm($id)
    {
        $user = Auth::user();
        $lesson = Lesson::where('id', $id)->firstOrFail();
        return view('frontend.forms.form',
            compact('user','lesson'));
    }
}
