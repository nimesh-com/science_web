<?php

namespace App\Http\Controllers\admin;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Mail\StudentAccountDetailsMail;
use Illuminate\Support\Facades\Mail;




class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Student::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('admission_number', 'like', $search . '%')
                    ->orWhere('admission_number', 'like', $search . '%')
                    ->orWhere('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('phone', 'like', '%' . $search . '%');
            });
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('active', $request->status);
        }

        // always order by latest
        $students = $query->orderBy('id', 'desc')->paginate(5)->withQueryString();
        // withQueryString keeps the search term in pagination links

        return view('admin.students.manageSt', compact('students'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.students.studentregistration');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'grade' => 'required',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        // ===== Get last student's admission number (handle both column names) =====
        $lastStudent = Student::orderBy('id', 'desc')->first();

        $lastAdmission = null;
        if ($lastStudent) {
            // prefer admission_number, fall back to admission_no
            $lastAdmission = $lastStudent->admission_number ?? $lastStudent->admission_no ?? null;
        }

        // ===== Extract numeric part safely and increment =====
        if ($lastAdmission) {
            // remove all non-digits to get only the numeric portion (works for A0001, ADM0001, etc.)
            $numericPart = preg_replace('/\D/', '', $lastAdmission);
            $lastNumber = (int) $numericPart;
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        // Format: Letter + 4-digit number (A0001)
        $admissionNo = 'A' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);

        // ===== Use admission number as default plain password (or change as needed) =====
        $plainPassword = $admissionNo;

        // ===== Create User (hash password) =====
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $plainPassword,
        ]);

        $user->sendEmailVerificationNotification();
        // ===== Save Student =====
        $studentData = [
            'name' => $request->name,
            'user_id' => $user->id,
            'grade' => $request->grade,
            'admission_number' => $admissionNo,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'active' => $request->has('active') ? 1 : 0,
        ];


        Student::create($studentData);
        
        
        //SEND DEFAULT PASSWORD EMAIL
        Mail::to($request->email)->send(new StudentAccountDetailsMail(
            $request->name,
            $admissionNo,
            $plainPassword
        ));

        return redirect()->route('students.index')
            ->with('success', 'Student registered successfully! Admission No: ' . $admissionNo . ' | Default Password: ' . $plainPassword);
    }
    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('admin.students.viewStudent', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'grade' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $student->update($validatedData);
        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {

        if ($student->user) {
            $student->user->delete();
        }
        return redirect()->route('students.index')
            ->with('success', 'Student and related user deleted successfully!');
    }


    public function toggleStatus($id)
    {
        $student = Student::with('user')->findOrFail($id);
        $student->active = !$student->active;
        $student->save();

        if ($student->user) {
            $student->user->status = $student->active; // match student status
            $student->user->save();
        }

        return redirect()->back()->with('success', 'Student status updated successfully!');
    }
}
