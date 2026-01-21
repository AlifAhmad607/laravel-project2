<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Http\Request;

class AdminTeacherController extends Controller
{
    public function index(Request $request)
{
    $search = $request->query('search');

    $teachers = Teacher::with('subject')
        ->when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhereHas('subject', function ($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
        })
        ->latest()
        ->paginate(5)
        ->withQueryString();

    $subjects = Subject::all();

    return view('admin.teacher.index', compact('teachers', 'subjects', 'search'));
}

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required',
            'subject_id' => 'required',
            'phone'      => 'required|unique:teachers',
            'email'      => 'required|unique:teachers',
            'address'    => 'required',
        ]);

        Teacher::create([
            'name'       => $request->name,
            'subject_id' => $request->subject_id,
            'phone'      => $request->phone,
            'email'      => $request->email,
            'address'    => $request->address,
        ]);

        return back()->with('success', 'Teacher added successfully');
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name'       => 'required',
            'subject_id' => 'required',
            'phone'      => 'required|unique:teachers,phone,' . $teacher->id,
            'email'      => 'required|unique:teachers,email,' . $teacher->id,
            'address'    => 'required',
        ]);

        $teacher->update([
            'name'       => $request->name,
            'subject_id' => $request->subject_id,
            'phone'      => $request->phone,
            'email'      => $request->email,
            'address'    => $request->address,
        ]);

        return back()->with('success', 'Teacher updated successfully');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return back()->with('success', 'Teacher deleted');
    }
}
