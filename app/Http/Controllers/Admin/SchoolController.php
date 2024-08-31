<?php

namespace App\Http\Controllers\Admin;

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\School\RequestUpdate;
use App\Http\Requests\School\SchoolRequest;

class SchoolController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
  
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // this will take you  to default page of school contain info about it 
        $schools = School::all();
        return view('admin.schools.index' , compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // this return page can create new school and store in database 
        return view('admin.schools.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SchoolRequest $request)
    {
   
        DB::beginTransaction();
        try {
              School::create([
                'name' => json_encode([
                    'ar' => $request->name_ar,
                    'en' => $request->name_en,
                ]),
                'description' => json_encode([
                    'ar' => $request->description_ar,
                    'en' => $request->description_en,
                ]),
                'address' => $request->address
            ]);
        
        DB::commit();        
             return redirect()->route('admin.schools.index')->with('success', 'create school successfully');
            
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return back()->with('error', 'there\'s something went wrong');

        }
       
        return 'this test just not stored yet';
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        // $school = School::find($school);
        return view('admin.schools.edit' , compact('school'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RequestUpdate $request, $school)
    {
        // here to edit specific row in school table 
        $school = School::find($school);

        DB::beginTransaction();
        try {
            $school->update([
                'name' => json_encode([
                    'ar' => $request->name_ar,
                    'en' => $request->name_en,
                ]),
                'description' => json_encode([
                    'ar' => $request->description_ar,
                    'en' => $request->description_en,
                ]),
                'address' => $request->address
            ]);
    
            DB::commit();

            return redirect()->route('admin.schools.index')->with('success' , 'successfully update');

        } catch (\Exception $th) {
            //throw this catch if fail return back;
            DB::rollBack();

            return back()->with('error' , 'Sorry not Done yet');
        }

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($school)
    {
        if (School::find($school)) {
            School::find($school)->delete();

            return back()->with('success' , 'school has been deleted successfully');
        }else {
            return 'not item to delete .... ';
        }
        // here can put temp delete function 


    }
}
