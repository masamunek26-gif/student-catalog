<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Список студентов
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    // Форма добавления
    public function create()
    {
        return view('students.create');
    }

    // Сохранение данных
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'group_name' => 'required|string|max:100',
            'email' => 'required|email|unique:students,email',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Студент успешно добавлен!');
    }
}