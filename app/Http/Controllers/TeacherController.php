<?php

namespace App\Http\Controllers;

use App\Models\ClassLevel;
use App\Models\Content;
use Rules\Password;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

class TeacherController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:teacher')->except('show','logout', 'store' , 'signIn', 'forgotPass', 'sentLink', 'showResetForm');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('home.teacher' , compact('teachers'));
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
    public function profile()
    {
        $teacher = Auth::guard('teacher')->user();
        $teacherContent = Content::where(['teacher_id' => $teacher->id])->get();
        $classLevels = ClassLevel::all();
        return view('sessions.teacher-profile' , compact('teacherContent' , 'classLevels' , 'teacher'));
    }
    public function signIn(Request $request)
    {
             //
             if (!Auth::guard('teacher')->attempt($request->only('email', 'password'))) {
    
                throw ValidationException::withMessages([
                    'email' => trans('auth.failed'),
                ]);
            }
            $teacher = Auth::guard('teacher')->user();
            $teacherContent = Content::where(['teacher_id' => $teacher->id])->get();
            $classLevels = ClassLevel::all();
            return redirect()->route('teacher.profile');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Teacher::class],
            'password' => ['required', 'confirmed'],
        ]);

        $teacher = Teacher::create([
            'name' => json_encode([
                'ar' => $request->name,
                'en'  => $request->name,
            ]),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone'  => '091813718',
            'address'  => 'test location',
            'school_id'  => $request->school_id
        ]);

        // event(new Registered($teacher));

        Auth::guard('teacher')->login($teacher);

        return redirect()->route('teacherProfile');

    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
        return view('sessions.teacher-profile' , compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

     public function logout()
     {
         Auth::guard('teacher')->logout();
         request()->session()->invalidate();
         request()->session()->regenerateToken();
 
         return redirect('/');
     }
    public function destroy(Teacher $teacher)
    {
        //
    }
}
