<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\City;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('city')->paginate(15);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $cities = City::all();
        return view('students.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'birthday' => 'required|date',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'city_id' => 'required|exists:cities,id',
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Studentas pridėtas!');
    }

    public function edit(Student $student)
    {
        $cities = City::all();
        return view('students.edit', compact('student', 'cities'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'birthday' => 'required|date',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'city_id' => 'required|exists:cities,id',
        ]);

        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Studentas atnaujintas!');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Studentas ištrintas!');
    }
}