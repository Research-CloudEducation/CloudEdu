<?php

namespace App\Http\Controllers\Admin;

use App\Models\School;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    //
    function index()
    {
        $teachers = Teacher::all();
        $students = Student::all();
        $schools  = School::all();
        
        return view('admin.index' , compact('teachers' , 'students' , 'schools'));
    }
}
