<?php

namespace App\Http\Controllers\admin;

use App\Models\OnClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OnClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = [];

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
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'grade' => 'required',
            'link'=>'required|url',
            'instructor'=>'required',
            'mode'=>'required',
            'start_date'=>'required|date',
            'start_time'=>'required',
            'status'=>'required',
        ]);

        OnClass::create($request->all());

        return redirect()->route('olc.index')
            ->with('success', 'Class created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(OnClass $onClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OnClass $onClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OnClass $onClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OnClass $onClass)
    {
        //
    }
}
