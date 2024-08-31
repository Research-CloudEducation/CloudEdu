<?php

namespace App\Http\Controllers\Admin;

use App\Models\Content;
use App\Models\Teacher;
use App\Models\Category;
use App\Models\ClassLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ContentControllrt extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!empty($request->class_id)) {
            # code...
            $contentBy = Content::where(['class_id' => $request->class_id])->get();
            $contents = [];

            return view('admin.content.index' , compact('contentBy' , 'contents'));
        }else {
            # code...
            // get content from database 
            $contents = Content::all();
            $classLevels = ClassLevel::all();
            $contentBy = Content::find($request->class_id);

            return view('admin.content.index' , compact('contents' , 'classLevels' , 'contentBy'));
        }
    }
    public function getContentBy(Request $request)
    {
        dd($request->all());
        $contentBy = Content::find($request->class_id);

        return view('admin.content.index' , compact('contentBy'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // get  all data related 
        $classLevels = ClassLevel::all();
        $categories = Category::all();
        $teachers    = Teacher::all();

        return view('admin.content.create' , compact('classLevels' , 'categories' , 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 
        // dd($request->all());
        DB::beginTransaction();

        try {

            if (request()->hasFile('file')) {
                $file = $request->file('file');
                $filename =   time() . '_' . $file->getClientOriginalName();
                $file->move('upload/content', $filename);
                $file_path = $filename;
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
                'image' => $file_path,
                'category_id' => $request->category_id,
                'class_id' => $request->class_id,
                'teacher_id' => $request->teacher_id
            ]);

            DB::commit();
            return redirect()->route('admin.contents.index')->with('success' , 'Added Successfully');

        } catch (\Throwable $th) {
            //throw $th; if fail then do this 
            DB::rollBack();

            return back()->with('error' , 'Fail to add , Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Content $content)
    {
        //
        $classLevels = ClassLevel::all();
        $categories = Category::all();
        $teachers    = Teacher::all();

        return view('admin.content.edit' , compact('content' , 'classLevels' , 'categories' , 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Content $content)
    {
        //
        DB::beginTransaction();

        try {

            if (request()->hasFile('file')) {
                $file = $request->file('file');
                $filename =   time() . '_' . $file->getClientOriginalName();
                $file->move('upload/content', $filename);
                $file_path = $filename;
              }
            $content->update([
                'title' => json_encode([
                    'ar' => $request->title,
                    'en' => $request->title,
                ]),
                'content' => json_encode([
                    'ar' => $request->content,
                    'en' => $request->content,
                ]),
                'image' => $file_path,
                'category_id' => $request->category_id,
                'class_id' => $request->class_id,
                'teacher_id' => $request->teacher_id
            ]);

            DB::commit();
            return redirect()->route('admin.contents.index')->with('success' , 'Updated  Successfully');

        } catch (\Throwable $th) {
            //throw $th; if fail then do this 
            DB::rollBack();

            return back()->with('error' , 'Fail to add , Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($content)
    {
        //
        Content::find($content)->delete();

        return back()->with('success', 'Delete Content Successfully' );

    }
}
