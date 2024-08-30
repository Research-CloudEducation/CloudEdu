<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class StudentController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:student')->except('logout', 'signIn' ,  'store', 'forgotPass', 'sentLink', 'showResetForm');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function signIn(Request $request)
    {
            //
            if (!Auth::guard('student')->attempt($request->only('email', 'password'))) {
                RateLimiter::hit($this->throttleKey());
    
                throw ValidationException::withMessages([
                    'email' => trans('auth.failed'),
                ]);
            }
            return redirect()->route('studentProfile');
    }
    public function store(Request $request)
    {
          // dd($request->all());
          $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Student::class],
            'password' => ['required', 'confirmed'],
        ]);

        $teacher = Student::create([
            'name' => json_encode([
                'ar' => $request->name,
                'en'  => $request->name,
            ]),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone'  => '091813718',
            'address'  => 'test location',
            'school_id'  => $request->school_id,
            'class_id'  => $request->class_id
        ]);

        // event(new Registered($teacher));

        Auth::guard('student')->login($teacher);

        return redirect()->route('studentProfile');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function logout()
    {
        Auth::guard('student')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
    public function destroy(Student $student)
    {
        //
    }
}
