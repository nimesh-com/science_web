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

        // Process each lesson
        $lessons->getCollection()->transform(function ($lesson) {
            if ($lesson->expiration_date) {
                $exp = new \DateTime($lesson->expiration_date);
                $lesson->formatted_expiration = $exp->format('M d, Y');
                $lesson->is_expired = $exp < new \DateTime();
            } else {
                $lesson->formatted_expiration = null;
                $lesson->is_expired = false;
            }
            return $lesson;
        });

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
        // Expiration formatting for a single lesson
        if ($lesson->expiration_date) {
            $exp = new \DateTime($lesson->expiration_date);
            $lesson->formatted_expiration = $exp->format('M d, Y');
            $lesson->is_expired = $exp < new \DateTime();
        } else {
            $lesson->formatted_expiration = null;
            $lesson->is_expired = false;
        }

        return view('admin.lessons.show', compact('lesson'));
    }

    public function edit(Lessons $lesson)
    {
        // Expiration formatting for a single lesson
        if ($lesson->expiration_date) {
            $exp = new \DateTime($lesson->expiration_date);
            $lesson->formatted_expiration = $exp->format('M d, Y');
            $lesson->is_expired = $exp < new \DateTime();
        } else {
            $lesson->formatted_expiration = null;
            $lesson->is_expired = false;
        }

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
