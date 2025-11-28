<?php

namespace App\Http\Controllers\admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Module;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modules = Module::orderBy('id', 'desc')->paginate(10);
        return view('admin.modules.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.modules.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:modules,slug',
            'description' => 'nullable|string',
        ]);

        Module::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
        ]);

        return redirect()->route('modules.index')->with('success', 'Module created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Module $module)
    {
        return view('admin.modules.show', compact('module'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Module $module)
    {
        return view('admin.modules.edit', compact('module'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Module $module)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:modules,slug,' . $module->id,
            'description' => 'nullable|string',
        ]);

        $module->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
        ]);

        return redirect()->route('modules.index')->with('success', 'Module updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Module $module)
    {
        $module->delete();
        return redirect()->route('modules.index')->with('success', 'Module deleted successfully.');
    }
}
