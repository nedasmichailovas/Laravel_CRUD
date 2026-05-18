<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\City;
use App\Models\Group;
use App\Rules\LithuanianAsmensKodas;
use App\Rules\LithuanianPhone;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('city', 'group')->paginate(20);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $cities = City::all();
        $groups = Group::all();
        return view('students.create', compact('cities', 'groups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'surname'      => 'required|string|max:255',
            'address'      => 'required|string',
            'phone'        => ['required', 'string', 'max:20', new LithuanianPhone()],
            'city_id'      => 'required|exists:cities,id',
            'grupe_id'     => 'required|exists:groups,id',
            'gim_data'     => 'nullable|date',
            'asmens_kodas' => ['nullable', new LithuanianAsmensKodas()],
        ]);

        Student::create($request->only([
            'name', 'surname', 'address', 'phone',
            'city_id', 'grupe_id', 'gim_data', 'asmens_kodas',
        ]));

        return redirect()->route('students.index')
                         ->with('success', 'Studentas pridetas!');
    }

    public function edit(Student $student)
    {
        $cities = City::all();
        $groups = Group::all();
        return view('students.edit', compact('student', 'cities', 'groups'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'surname'      => 'required|string|max:255',
            'address'      => 'required|string',
            'phone'        => ['required', 'string', 'max:20', new LithuanianPhone()],
            'city_id'      => 'required|exists:cities,id',
            'grupe_id'     => 'required|exists:groups,id',
            'gim_data'     => 'nullable|date',
            'asmens_kodas' => ['nullable', new LithuanianAsmensKodas()],
        ]);

        $student->update($request->only([
            'name', 'surname', 'address', 'phone',
            'city_id', 'grupe_id', 'gim_data', 'asmens_kodas',
        ]));

        return redirect()->route('students.index')
                         ->with('success', 'Studentas atnaujintas!');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')
                         ->with('success', 'Studentas istrintas!');
    }

    public function trashed()
    {
        $students = Student::onlyTrashed()
                           ->with('city', 'group')
                           ->paginate(20);
        return view('students.trashed', compact('students'));
    }

    public function restore($id)
    {
        Student::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('students.trashed')
                         ->with('success', 'Studentas atkurtas!');
    }

    public function forceDelete($id)
    {
        Student::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('students.trashed')
                         ->with('success', 'Studentas istrinas visam laikui!');
    }
}