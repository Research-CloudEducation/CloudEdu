<?php

namespace App\Http\Controllers\Admin;

use App\Models\School;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\TeacherCreateRequest;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $teachers = Teacher::all();
        return view('admin.teachers.index' , compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $schools = School::all();
        return view('admin.teachers.create' , compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeacherCreateRequest $request)
    {
        // dd($request->all());
        // store data of teacher in database 
        DB::beginTransaction();

        try {
            Teacher::create([
                'name' => json_encode([
                    'ar' => $request->name_ar,
                    'en' => $request->name_en,
                ]),
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'address' => $request->address,
                'school_id' => $request->school_id
            ]);

            DB::commit();
            return redirect()->route('admin.teachers.index')->with('success' , 'Added Successfully');

        } catch (\Throwable $th) {
            //throw $th; if fail then do this 
            DB::rollBack();

            return back()->with('error' , 'Fail to add , Something went wrong');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        // get 
        $schools = School::all();
        return view('admin.teachers.edit' , compact('teacher' , 'schools'));
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
    public function destroy($teacher)
    {
        // 
        if (Teacher::find($teacher)) {
            Teacher::find($teacher)->delete();

            return back()->with('success' , 'school has been deleted successfully');
        }else {
            return 'not item to delete .... ';
        }
        // here can put temp delete function 
    }
}
