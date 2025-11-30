<?php

namespace App\Http\Controllers\LMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lessons;

class LMSController extends Controller
{
    public function index()
    {
        return view('student.LMS.LMSDB');
    }

public function LiveSession()
{
    $user = Auth::user();
    $classes = collect();

    if ($user->role == 'student' && $user->student) {
        $classes = $user->student->onClasses()->where('status', 1)->get();
    }

    return view('student.LMS.live', compact('classes'));
}



public function RecordedSessions()
{
    $user = Auth::user();
    $videos = collect(); // default empty collection

    if ($user->role === 'student' && $user->student) {
        $student = $user->student;

        // Get all classes for this student's grade
        $classes = $student->onClasses ?? collect();

        if ($classes->isNotEmpty()) {
            $classIds = $classes->pluck('id'); // get IDs of classes
            $videos = Lessons::whereIn('on_class_id', $classIds)->get();
        }
    }

    return view('student.LMS.vedio', compact('videos'));
}

    
}
