<?php

namespace App\Http\Controllers\admin;

use App\Models\OnClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ClassLinkMail;
use App\Models\Student;
use Illuminate\Support\Facades\Mail;
use App\Models\Lessons;

class OnClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = OnClass::orderBy('id', 'desc')->paginate(10);

        return view('admin.olc.clsList', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.olc.create');
    }

    /**
     * Store a newly created resource in storage.
     */ public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'name'        => 'required|string|max:255',
            'grade'       => 'required',
            'link'        => 'required|url',
            'instructor'  => 'required|string|max:255',
            'mode'        => 'required|in:online,offline',
            'start_date'  => 'required|date',
            'start_time'  => 'required',
        ]);

        // Prepare data
        $data = $request->only(['name', 'grade', 'link', 'instructor', 'mode', 'start_date', 'start_time']);
        // Create class
        $class = OnClass::create($data);

        /* create Lesson */
        $lessonData = [
            'on_class_id'    => $class->id,
            'name'           => $class->name,
            'slug'           => null,
            'expiration_date' => date('Y-m-d', strtotime($class->start_date . ' +10 days')),
            'status'         => 0,
        ];

        Lessons::create($lessonData);

        // Prepare class data array for email
        $classData = [
            'name'       => $class->name,
            'grade'      => $class->grade,
            'link'       => $class->link,
            'instructor' => $class->instructor,
            'mode'       => $class->mode,
            'start_date' => $class->start_date,
            'start_time' => $class->start_time,
        ];

        // Get students of the same grade
        $students = Student::where('grade', $class->grade)->get();

        foreach ($students as $student) {
            $studentData = [
                'name'  => $student->name,
                'email' => $student->email,
            ];

            // Queue email (safe)
            try {
                Mail::to($student->email)->send(new ClassLinkMail($classData, $studentData));
            } catch (\Exception $e) {
                dd($e->getMessage());
            }
        }

        return redirect()->route('classes.index')
            ->with('success', 'Class created successfully and students notified!');
    }
    /**
     * Display the specified resource.
     */
    public function show(OnClass $class)
    {
        return view('admin.olc.view', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OnClass $class)
    {
        return view('admin.olc.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OnClass $class)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'grade' => 'required',
            'link' => 'required|url',
            'instructor' => 'required',
            'mode' => 'required',
            'start_date' => 'required|date',
            'start_time' => 'required',
            'status' => 'nullable',
        ]);

        // Prepare data for update
        $data = $request->only(['name', 'grade', 'link', 'instructor', 'mode', 'start_date', 'start_time']);

        // Update status only if checkbox is present
        if ($request->has('status')) {
            $data['status'] = $request->status; // 1 if checked
        }

        $class->update($data);

        return redirect()->route('classes.index')
            ->with('success', 'Class updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OnClass $class)
    {
        $class->delete();

        return redirect()->route('classes.index')
            ->with('success', 'Class deleted successfully!');
    }
}
