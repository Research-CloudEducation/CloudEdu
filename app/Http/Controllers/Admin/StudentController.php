<?php

namespace App\Http\Controllers\Admin;

use App\Models\School;
use App\Models\Student;
use App\Models\ClassLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Student\StudentCreateRequest;
use App\Http\Requests\Student\StudentUpdateRequest;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all school and class level
        $students = Student::orderBy('id' ,'DESC')->get();
        // $schools  = School::all();
        // $classLevels = ClassLevel::all();

        return view('admin.students.index' , compact(  'students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // get school and class level to add new student depend on it 
        $schools  = School::all();
        $classLevels = ClassLevel::all();

        return view('admin.students.create' ,  compact('schools', 'classLevels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentCreateRequest $request)
    {
        // store into database comes from form
        //start handle transaction database 
        DB::beginTransaction();

        try {
            // here try to store data 
            Student::create([
                'name' => json_encode([
                    'ar' => $request->name_ar,
                    'en' => $request->name_en
                ]),
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone'  => $request->phone,
                'address' => $request->address,
                'school_id' => $request->school_id,
                'class_id'  => $request->class_id,
                'approve'   => true,
            ]);

            DB::commit();

            return redirect()->route('admin.students.index')->with('success' , 'Student Added Successfully');
        } catch (\Throwable $th) {
            //throw $th if fail to store then roll back the transaction;

            DB::rollBack();

            return back()->with('error' , 'Failed Something went Wrong');
        }
        
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
        // get edit student 
        $schools  = School::all();
        $classLevel = ClassLevel::all();
        return view('admin.students.edit' , compact('student' , 'schools' , 'classLevel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentUpdateRequest $request, Student $student)
    {
        // update student info 

        DB::beginTransaction();

        try {
            // try to update data 
            $student->update([
                'name' => json_encode([
                    'ar' => $request->name_ar,
                    'en' => $request->name_en
                ]),
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone'  => $request->phone,
                'address' => $request->address,
                'school_id' => $request->school_id,
                'class_id'  => $request->class_id,
            ]);

            DB::commit();

            return redirect()->route('admin.students.index')->with('success' , 'Update Successfully ');
        } catch (\Throwable $th) {
            //throw $th if failed then roll back from transaction ;

            DB::rollBack();

            return back()->with('error' , 'Failed Something went wrong');
        }
    }

    public function approve($student)
    {

        // dd($student);
        $student = Student::find($student);
        DB::beginTransaction();

        try {
            // try to update data 
            $student->update([
    
                'approve' => true,

            ]);

            DB::commit();

            return back()->with('success' , 'Student Has Been Approval Successfully ');
        } catch (\Throwable $th) {
            //throw $th if failed then roll back from transaction ;

            DB::rollBack();

            return back()->with('error' , 'Failed Something went wrong');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($student)
    {
        // get student and then deleted 
        if (Student::find($student)) {
            #do delete 
            Student::find($student)->delete();
            return back()->with('success' , 'Delete Successfully');
        }else {
            # do failed deletion
            return ' no thing to delete (:';
        }
    }
}
