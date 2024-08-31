<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agent;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Agent\AgentCreateRequest;
use App\Http\Requests\Agent\AgentUpdateRequest;
use App\Models\User;
use Hamcrest\Core\IsNot;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
        return $this->middleware('admin');
     }

    public function index(Request $request)
    {
       if ($request->has('agent')) {
         // get all data related with agent of school here 
         $users = User::whereNot('is_admin' , true)->get();
         return view('admin.agents.index' , compact('users'));
       }else{
         // get all data related with agent of school here 
         $data = User::whereNot('is_admin' , true)->get();
         return view('admin.users.index1' , compact('data'));
       }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // get data related also with agent of school to  create form by link 
        $schools = School::all();
        return view('admin.agents.create' , compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AgentCreateRequest $request)
    {
        // after filter validate the request do below
        // dd($request->all());
        // begin transaction with try 
        DB::beginTransaction();

        try {
            // try to store data into 
            User::create([
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
            return redirect()->route('admin.agents.index')->with('success' , 'Added Successfully');

        } catch (\Throwable $th) {
            //throw $th; if fail then do this 
            DB::rollBack();

            return back()->with('error' , 'Fail to add , Something went wrong');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Agent $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $agent)
    {
        // get agent to edit details
        $schools = School::all();
        return view('admin.agents.edit' , compact('agent' , 'schools'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AgentUpdateRequest $request, User $agent)
    {
        // do update agent details 
        DB::beginTransaction();

        try {
            $agent->update([
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
            return redirect()->route('admin.agents.index')->with('success' , 'Updated Successfully');

        } catch (\Throwable $th) {
            //throw $th; if fail then do this 
            DB::rollBack();

            return back()->with('error' , 'Fail to add , Something went wrong');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($agent)
    {
        // try find agent first then do delete 
        if (User::find($agent)) {
            # do delete directly
            User::find($agent)->delete();
        }else {
            # do something else 
            return 'failed to delete no find such what you need (:';
        }
    }
}
