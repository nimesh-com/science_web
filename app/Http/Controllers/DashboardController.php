<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Student;
use App\Models\Course;
use App\Models\OnClass;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $courses = Course::all();
        return view('student.master', compact('courses'));
 
    }

    public function guestDB() {}

    public function adminDB()
    {

        $Modules = Module::all();
        $StudentsCNT = Student::all()->count();
        $blockedStudents = Student::where('active', '0')->count();

        $coursesCNT = Course::all()->count();
        $liveclassCNT = OnClass::all()->count();


        return view('admin.master', compact('Modules', 'StudentsCNT', 'blockedStudents', 'coursesCNT', 'liveclassCNT'));
    }

    public function showDashboard(Request $request)
    {
        $user = $request->user();
        switch ($user->role) {
            case 'admin':
                return redirect(route('admin'));
            case 'student':
                return redirect(route('LMS'));
            default:
                abort(403, 'Unauthorized action.');
                break;
        }
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
