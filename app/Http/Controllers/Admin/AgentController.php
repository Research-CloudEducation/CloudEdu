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

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
        return $this->middleware('admin');
     }

    public function index()
    {
        // get all data related with agent of school here 
        $agents = Agent::all();
        return view('admin.agents.index' , compact('agents'));
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

        // begin transaction with try 
        DB::beginTransaction();

        try {
            // try to store data into 
            Agent::create([
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
    public function edit(Agent $agent)
    {
        // get agent to edit details
        return view('admin.agents.edit' , compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AgentUpdateRequest $request, Agent $agent)
    {
        // do update agent details 
        DB::beginTransaction();

        try {
            $agent->create([
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
        if (Agent::find($agent)) {
            # do delete directly
            Agent::find($agent)->delete();
        }else {
            # do something else 
            return 'failed to delete no find such what you need (:';
        }
    }
}
