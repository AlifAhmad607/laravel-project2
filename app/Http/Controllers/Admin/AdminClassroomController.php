<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; // ✅ Tambahkan ini
use App\Models\Classroom;

class AdminClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $search = $request->query('search');

    $classrooms = Classroom::when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%");
        })
        ->latest()
        ->paginate(5)
        ->withQueryString();

    return view('admin.classroom.index', compact('classrooms', 'search'));
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
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Classroom::create(['name' => $request->name]);

        return redirect()->back()->with('success', 'Classroom berhasil ditambahkan!');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('classrooms')->ignore($id), // ✅ Sudah benar
            ],
        ]);

        // Cari data kelas berdasarkan ID
        $classroom = Classroom::findOrFail($id);

        // Update data
        $classroom->update([
            'name' => $request->name,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Classroom berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    $classroom = Classroom::findOrFail($id);
    $classroom->delete();

    return redirect()->route('admin.classroom.index')
                     ->with('success', 'Siswa berhasil dihapus!');
    }
    
}
