<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Guardian;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalStudents'   => Student::count(),
            'totalTeachers'   => Teacher::count(),
            'totalClassrooms' => Classroom::count(),
            'totalSubjects'   => Subject::count(),
            'totalGuardians'  => Guardian::count(),
        ]);
    }
}
