<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class AdminSubjectController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $subjects = Subject::when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('admin.subject.index', compact('subjects', 'search'));
    }


    public function create()
    {
        return view('admin.subject.form_create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Subject::create($validated);

        return redirect()->route('admin.subject.index')->with('success', 'Subject created successfully!');
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('admin.subject.form_edit', compact('subject'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $subject = Subject::findOrFail($id);
        $subject->update($validated);

        return redirect()->route('admin.subject.index')->with('success', 'Subject updated successfully!');
    }
}
