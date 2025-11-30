<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class PageController extends Controller
{
    public function courses()
    {
          $courses = Course::all();
        return view('student.course', compact('courses'));
    }
}
