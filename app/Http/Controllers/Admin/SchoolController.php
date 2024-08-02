<?php

namespace App\Http\Controllers\Admin;

use App\Models\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\School\SchoolRequest;

class SchoolController extends Controller
{
    /**
     * Show the form for creating the resource.
     */

    public function index()
    {
        if(!auth()->check() || !auth()->user()->is_admin)
        {
            abort(404);
        }

        return view('admin.schools.index');
    }
    public function create()
    {
        // abort(404);

        return view('admin.schools.create');
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(SchoolRequest $request)
    {
        // $request->user()->fill($request->validated());
        
        dd($request->all());
        // $request->school()->fill($request->validated());

        $request->school->name = json_encode([
            'ar' => $request->name_ar,
            'en' => $request->name_en
        ]);

        $request->school->description = json_encode([
            'ar' => $request->description_ar,
            'en' => $request->description_en
        ]);

        $request->school->address = $request->address;

        $request->school->save();

          Redirect::route('admin.schools.create')->with('status' , 'school-created');

        abort(404);
    }

    /**
     * Display the resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(): never
    {
        abort(404);
    }
}
