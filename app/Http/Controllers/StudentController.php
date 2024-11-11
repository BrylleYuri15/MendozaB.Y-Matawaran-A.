<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request; 
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View; 

class StudentController extends Controller
{
    
    public function index(): View
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    
    public function create(): View
    {
        return view('students.create');
    }

  
    public function store(Request $request): RedirectResponse
    {
       
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
            'age' => 'required|integer|min:1',
        ]);

        Student::create($validated);

  
        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

   
    public function show(string $id): View
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    public function edit(string $id): View
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:students,email,' . $id,
            'age' => 'sometimes|integer|min:1',
        ]);

        $student = Student::findOrFail($id);
       
        $student->update($validated);

      
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(string $id): RedirectResponse
    {
   
        $student = Student::findOrFail($id);
        
 
        $student->delete();


        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
