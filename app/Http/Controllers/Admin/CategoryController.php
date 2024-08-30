<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\ClassLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // view index of category 
        $categories = Category::all();
        return view('admin.categories.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // view create new category of subject form with class model 
        $classLevels = ClassLevel::all();
        return view('admin.categories.create' , compact('classLevels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
         // store data of teacher in database 
         DB::beginTransaction();

         try {
 
             if (request()->hasFile('file')) {
                 $file = $request->file('file');
                 $filename =   time() . '_' . $file->getClientOriginalName();
                 $file->move('upload/subject', $filename);
                 $file_path = $filename;
               }
             Category::create([
                 'name' => json_encode([
                     'ar' => $request->name_ar,
                     'en' => $request->name_en,
                 ]),
                 'description' => json_encode([
                     'ar' => $request->description_ar,
                     'en' => $request->description_en,
                 ]),
                 'file' => $file_path,
                 'class_id' => $request->class_id
             ]);
 
             DB::commit();
             return redirect()->route('admin.categories.index')->with('success' , 'Added Successfully');
 
         } catch (\Throwable $th) {
             //throw $th; if fail then do this 
             DB::rollBack();
 
             return back()->with('error' , 'Fail to add , Something went wrong');
         }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        $classLevels = ClassLevel::all();
        return view('admin.categories.edit' , compact('classLevels' , 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
          // store data of teacher in database 
          DB::beginTransaction();

          try {
  
              if (request()->hasFile('file')) {
                  $file = $request->file('file');
                  $filename =   time() . '_' . $file->getClientOriginalName();
                  $file->move('upload/subject', $filename);
                  $image_path = $filename;
                  $category->update([
                    'name' => json_encode([
                        'ar' => $request->name_ar,
                        'en' => $request->name_en
                    ]),
                    'description' => json_encode([
                        'ar' => $request->description_ar,
                        'en' => $request->description_en,
                    ]),
                    'file' => $image_path,
                    'class_id' => $request->class_id
                ]);
                }else{
                $category->update([
                  'name' => json_encode([
                      'ar' => $request->name_ar,
                      'en' => $request->name_en
                  ]),
                  'description' => json_encode([
                      'ar' => $request->description_ar,
                      'en' => $request->description_en,
                  ]),
                  'class_id' => $request->class_id
              ]);
            }
              DB::commit();
              return redirect()->route('admin.categories.index')->with('success' , 'Updated Successfully');
  
          } catch (\Throwable $th) {
              //throw $th; if fail then do this 
              DB::rollBack();
  
              return back()->with('error' , 'Fail to Update , Something went wrong');
          }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        
        if (Category::find($category)) {
            Category::find($category)->delete();

            return back()->with('success' , 'Class-level Delete Successfully');
        }else
        {
            return 'something went wrong >>> Not Delete Any (:';
        }
    }
}
