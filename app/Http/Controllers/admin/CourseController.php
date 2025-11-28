<?php

namespace App\Http\Controllers\admin;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::orderBy('id', 'desc')->paginate(10);
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ValidatedData = $request->validate([
            'name' => 'required|string|max:255',
            'study_mode' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'grade' => 'required|string|max:255',
            'instructor' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/courses'), $imageName);
            $ValidatedData['image'] = $imageName;
        }
        Course::create($ValidatedData);
        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('admin.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $imageName = $course->image;
        $ValidatedData = $request->validate([
            'name' => 'required|string|max:255',
            'study_mode' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'grade' => 'required|string|max:255',
            'instructor' => 'required|string|max:255',
            'status' => 'required|in:0,1',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/courses'), $imageName);
            $ValidatedData['image'] = $imageName;
        }

        $ValidatedData['image'] = $imageName;

        $course->update($ValidatedData);
        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
