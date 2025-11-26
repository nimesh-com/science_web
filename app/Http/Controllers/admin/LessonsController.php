<?php

namespace App\Http\Controllers\admin;

use App\Models\Lessons;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class LessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = Lessons::orderBy('id', 'desc')->paginate(10);

        return view('admin.lessons.view', compact('lessons'));
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
    public function show(Lessons $lesson)
    {
        return view('admin.lessons.show', compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lessons $lesson)
    {
        return view('admin.lessons.edit', compact('lesson'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lessons $lesson)
    {
        $lesson->update($request->all());

        return redirect()->route('lessons.index')
            ->with('success', 'Lesson updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lessons $lessons)
    {
        $lessons->delete();

        return redirect()->route('lessons.index')
            ->with('success', 'Lesson deleted successfully!');
    }
}
