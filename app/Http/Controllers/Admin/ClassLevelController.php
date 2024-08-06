<?php

namespace App\Http\Controllers\Admin;

use App\Models\ClassLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassLevel\ClassLevelCreateRequest;

class ClassLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all classes 
        $classes = ClassLevel::all();
        return view('admin.classLevel.index' , compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // create new classes level 
        return view('admin.classLevel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClassLevelCreateRequest $request)
    {
        // get data from form and store to database 

        DB::beginTransaction();
        try {
            // try to store data into database 
            ClassLevel::create([
                'name' => json_encode([
                    'ar' => $request->name_ar,
                    'en' => $request->name_en
                ]),
                'description' => json_encode([
                    'ar' => $request->description_ar,
                    'en' => $request->description_en
                ]),
            ]);

            DB::commit();

            return redirect()->route('admin.class-level.index')->with('success' , 'added Successfully');
        } catch (\Throwable $th) {
            //throw $th if fail then through this function 
            DB::rollBack();
            
            return back()->with('error' ,'fail something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassLevel $classLevel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassLevel $classLevel)
    {
        // edit with detect class id level 
        return view('admin.classLevel.edit' , compact('classLevel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassLevel $classLevel)
    {
        // update the class level with some id attr
        DB::beginTransaction();
        try {
            // try to update data come from edit form 
            $classLevel->update([
                'name' => json_encode([
                    'ar' => $request->name_ar,
                    'en' => $request->name_en
                ]),
                'description' => json_encode([
                    'ar' => $request->description_ar,
                    'en' => $request->description_en,
                ])
            ]);

            DB::commit(); // here to commit the update data into database 
            return redirect()->route('admin.class-level.index')->with('success' , 'Update Successfully');

        } catch (\Throwable $th) {
            //throw $th if fail thrn roll back from editing the data ;
            DB::rollBack();

            return back()->with('error' , 'fail something went wrong');
        } 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($classLevel)
    {
        // delete the class if un went it 

        if (ClassLevel::find($classLevel)) {
            ClassLevel::find($classLevel)->delete();

            return back()->with('success' , 'Class-level Delete Successfully');
        }else
        {
            return 'something went wrong >>> Not Delete Any (:';
        }
    }
}
