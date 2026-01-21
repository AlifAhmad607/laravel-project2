<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guardian;
use Illuminate\Http\Request;

class AdminGuardianController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

    $guardians = Guardian::when($search, function ($query) use ($search) {
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('job', 'like', "%{$search}%");
        })
        ->latest()
        ->paginate(5)
        ->withQueryString();
        return view('admin.guardian.index', compact('guardians'));
    }

    public function create()
    {
        return view('admin.guardian.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'job' => 'nullable',
            'address' => 'required',
            'phone' => 'required|unique:guardians',
            'email' => 'required|unique:guardians',
            'gender' => 'required',
        ]);

        Guardian::create($request->all());

        return redirect()->route('admin.guardian.index')
                         ->with('success', 'Guardian added successfully');
    }

    public function edit(Guardian $guardian)
    {
        return view('admin.guardian.edit', compact('guardian'));
    }

    public function update(Request $request, Guardian $guardian)
    {
        $request->validate([
            'nama' => 'required',
            'job' => 'nullable',
            'address' => 'required',
            'phone' => 'required|unique:guardians,phone,' . $guardian->id,
            'email' => 'required|unique:guardians,email,' . $guardian->id,
            'gender' => 'required',
        ]);

        $guardian->update($request->all());

        return redirect()->route('admin.guardian.index')
                         ->with('success', 'Guardian updated successfully');
    }

    public function destroy(Guardian $guardian)
    {
        $guardian->delete();
        return redirect()->route('admin.guardian.index')
                         ->with('success', 'Guardian deleted');
    }
}
