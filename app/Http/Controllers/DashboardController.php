<?php

namespace App\Http\Controllers;

use App\Models\Lessons;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Student;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    public function guestDB() {}

    public function adminDB()
    {

        $Modules = Module::all();
        $StudentsCNT = Student::all()->count();
        $blockedStudents = Student::where('active', '0')->count();

        return view('admin.master', compact('Modules', 'StudentsCNT', 'blockedStudents'));
    }

    public function showDashboard(Request $request)
    {
        $user = $request->user();
        switch ($user->role) {
            case 'admin':
                return redirect(route('admin'));
            case 'student':
                // Fetch student-specific data
                $student = Student::where('user_id', $user->id)->first();
                $classes = $student ? $student->onClasses : []; // Assuming relationship exists

                $materials = collect();
                if ($classes->count()) {
                    $classIds = $classes->pluck('id');  // extract IDs from classes
                    $materials = Lessons::whereIn('on_class_id', $classIds)->get();
                }

                $announcements = []; // Placeholder for announcements, implement as needed
                return view('student.LMS', compact('classes', 'announcements', 'student', 'materials'));
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
