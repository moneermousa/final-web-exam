<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::orderBy('id', 'desc')->paginate(10);;
	    return view('students.all', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required|max:255|min:8',
            'student_id' => 'required|max:8|min:8',
            'major' => 'required|max:255|min:6',
            'email' => 'required|max:255|min:6',
            'phone' => 'required|max:255|min:6',
        ], [
            'name.required' => 'Please, Enter The Student Name.',
            'student_id.required' => 'Please, Enter The Student ID.',
            'major.required' => 'Please, Enter The Student Major.',
            'email.required' => 'Please, Enter The Student Email.',
            'phone.required' => 'Please, Enter The Student Phone.',
        ]);

        $student = new Student();
        $student->name = $request->name;
        $student->student_id_number = $request->student_id;
        $student->major = $request->major;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();

        return redirect()->route('students.create')->with('success', 'New Student Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $students = Student::findOrFail($id);

        return response()->view('students.show', compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $students = Student::findOrFail($id);

        return response()->view('students.edit', compact('students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated_data = $request->validate([
            'name' => 'required|max:255|min:8',
            'student_id' => 'required|max:8|min:8',
            'major' => 'required|max:255|min:6',
            'email' => 'required|max:255|min:6',
            'phone' => 'required|max:255|min:6',
        ], [
            'name.required' => 'Please, Enter The Student Name.',
            'student_id.required' => 'Please, Enter The Student ID.',
            'major.required' => 'Please, Enter The Student Major.',
            'email.required' => 'Please, Enter The Student Email.',
            'phone.required' => 'Please, Enter The Student Phone.',
        ]);;

        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->student_id_number = $request->student_id;
        $student->major = $request->major;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $isSave = $student->save();

        if ($isSave) {
            return redirect()->route('students.edit', $id)->with('success', 'Student Edited Successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        
        $student = Student::findOrFail($id);

        $student->delete();

        $page = $request->query('page', 1);

        return redirect()->route('students.index', ['page' => $page])->with('success', 'The Student Deleted Successfully!');
    }
}
