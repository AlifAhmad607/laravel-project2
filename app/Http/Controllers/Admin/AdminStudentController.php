<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Validation\Rule;


class AdminStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
    {
        $search = $request->query('search');

        $students = Student::with('classroom')
            ->when($search, function ($query, $search) {
                $query->where('nama', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString();

        $classrooms = Classroom::all();

        return view('admin.student.index', compact('students', 'classrooms', 'search'));
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
        $request->validate([
        'nama'         => 'required|string|max:255',
        'email'        => 'required|email|unique:students,email',
        'classroom_id' => 'required|exists:classrooms,id',
        'address'      => 'required|string',
        'phone'        => 'required|string|max:20',
        'gender'       => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
        'date_of_birth'=> 'required|date',
    ]);

    Student::create($request->all());

    return redirect()->route('admin.student.index')->with('success', 'Siswa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    $student = Student::findOrFail($id);
    $classrooms = Classroom::all();

    return view('admin.student.edit', compact('student', 'classrooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $student = Student::findOrFail($id);

    $request->validate([
        'nama'         => 'required|string|max:255',
        'email'        => ['required','email', Rule::unique('students')->ignore($student->id)],
        'classroom_id' => 'required|exists:classrooms,id',
        'address'      => 'required|string',
        'phone'        => 'required|string|max:20',
        'gender'       => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
        'date_of_birth'=> 'required|date',
    ]);

    $student->update($request->all());

    return redirect()->route('admin.student.index')
                     ->with('success', 'Data siswa berhasil diperbarui!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    $student = Student::findOrFail($id);
    $student->delete();

    return redirect()->route('admin.student.index')
                     ->with('success', 'Siswa berhasil dihapus!');
    }
}
