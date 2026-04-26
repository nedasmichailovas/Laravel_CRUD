<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\City;
use App\Models\Group;
 
class StudentController extends Controller
{
    // Rodyti visus studentus (visiems prieinamas)
    public function index()
    {
        $students = Student::with('city', 'group')->paginate(20);
        return view('students.index', compact('students'));
    }
 
    // Forma naujam studentui
    public function create()
    {
        $cities = City::all();
        $groups = Group::all();
        return view('students.create', compact('cities', 'groups'));
    }
 
    // Issaugoti nauja studenta
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'surname'  => 'required|string|max:255',
            'address'  => 'required|string',
            'phone'    => 'required|string|max:20',
            'city_id'  => 'required|exists:cities,id',
            'grupe_id' => 'required|exists:groups,id',
            'gim_data' => 'nullable|date',
        ]);
 
        Student::create($request->only([
            'name', 'surname', 'address', 'phone',
            'city_id', 'grupe_id', 'gim_data',
        ]));
 
        return redirect()->route('students.index')
                         ->with('success', 'Studentas pridetas!');
    }
 
    // Redagavimo forma
    public function edit(Student $student)
    {
        $cities = City::all();
        $groups = Group::all();
        return view('students.edit', compact('student', 'cities', 'groups'));
    }
 
    // Atnaujinti studenta
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'surname'  => 'required|string|max:255',
            'address'  => 'required|string',
            'phone'    => 'required|string|max:20',
            'city_id'  => 'required|exists:cities,id',
            'grupe_id' => 'required|exists:groups,id',
            'gim_data' => 'nullable|date',
        ]);
 
        $student->update($request->only([
            'name', 'surname', 'address', 'phone',
            'city_id', 'grupe_id', 'gim_data',
        ]));
 
        return redirect()->route('students.index')
                         ->with('success', 'Studentas atnaujintas!');
    }
 
    // Soft delete (pazymi kaip istrinta)
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')
                         ->with('success', 'Studentas istrintas!');
    }
 
    // Rodyti istrinta sarasa
    public function trashed()
    {
        $students = Student::onlyTrashed()
                           ->with('city', 'group')
                           ->paginate(20);
        return view('students.trashed', compact('students'));
    }
 
    // Atkurti istrinta studenta
    public function restore($id)
    {
        Student::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('students.trashed')
                         ->with('success', 'Studentas atkurtas!');
    }
 
    // Istrinti visam laikui
    public function forceDelete($id)
    {
        Student::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('students.trashed')
                         ->with('success', 'Studentas istrinas visam laikui!');
    }
}
