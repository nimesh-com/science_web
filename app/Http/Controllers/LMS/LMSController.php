<?php

namespace App\Http\Controllers\LMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LMSController extends Controller
{
    public function index()
    {
        return view('student.LMS');
    }
}
