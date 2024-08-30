<?php

namespace App\Http\Controllers;

use App\Models\ClassLevel;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get content
        $contents = Content::all();
        $classLevels = ClassLevel::all();
        return view('home.content' , compact('contents' , 'classLevels'));

    }

    public function getContent($id)
    {
        // dd($id);
        $content = Content::find($id);
        
        return view('home.view-content' , compact('content'));
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
    public function store(Request $request)
    {
        // dd($request->all());
        // store data of teacher in database 
        DB::beginTransaction();

        try {

            if (request()->hasFile('image')) {
                $file = $request->file('image');
                $filename =   time() . '_' . $file->getClientOriginalName();
                $file->move('upload/content', $filename);
                $image_path = $filename;
              }
            Content::create([
                'title' => json_encode([
                    'ar' => $request->title,
                    'en' => $request->title,
                ]),
                'content' => json_encode([
                    'ar' => $request->content,
                    'en' => $request->content,
                ]),
                'image' => $image_path,
                'category_id' => $request->category_id,
                'class_id' => $request->class_id,
                'teacher_id' => $request->id
            ]);

            DB::commit();
            return redirect()->with('success' , 'Added Successfully');

        } catch (\Throwable $th) {
            //throw $th; if fail then do this 
            DB::rollBack();

            return back()->with('error' , 'Fail to add , Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
