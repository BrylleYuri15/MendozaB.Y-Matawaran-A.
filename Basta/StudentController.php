<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request; // Add this import if it's missing
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View; // Correctly import View

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
            'age' => 'required|integer|min:1',
        ]);

        // Create the new student record
        Student::create($validated);

        // Redirect back to the student list with success message
        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        // Validate the incoming request data, making sure the email is unique except for the current student
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:students,email,' . $id,
            'age' => 'sometimes|integer|min:1',
        ]);

        // Find the student to update
        $student = Student::findOrFail($id);
        
        // Update the student with the validated data
        $student->update($validated);

        // Redirect back to the student list with success message
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        // Find the student to delete
        $student = Student::findOrFail($id);
        
        // Delete the student record
        $student->delete();

        // Redirect back to the student list with success message
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
