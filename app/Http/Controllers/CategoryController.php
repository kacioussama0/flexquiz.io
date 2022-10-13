<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;


class CategoryController extends Controller
{

    public function  __construct()
    {
        $this -> middleware('auth');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $categories = $category -> all();
        return view('categories.index',compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
          'title'=>'required | min:3 | max: 50',
            'image' => [
                'required',
                File::types(['jpg','png','svg'])
            ]
        ]);

        $FILE = $request->file('image')->store('public/categories');


        if($FILE) {
            $fileName = explode('/',$FILE)[2];
            Category::create(['title'=>$request->title,'image' => $fileName]);
        }

        return redirect()->to('categories');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {


        return  view('categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $item = [
            'id' => $category->id,
            'title' => $category->title,
            'image' => $category->image,
        ];
        return view('categories.edit',['category'=> $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request -> validate([
            'title'=>'required | min:3 | max: 50',
            'image' => [
                File::types(['jpg','png','svg'])
            ]
        ]);



        if($request -> title  != old('title')) {
            $category -> update(['title'=> $request->title]);
        }

        if($request -> file('image') != null) {

            Storage::disk('public')->delete('categories/' . $category->image);
            $FILE = $request->file('image')->store('public/categories');



            if($FILE) {
                $fileName = explode('/', $FILE)[2];
                $category -> update([
                    'image' => $fileName
                ]);
            }

        }



        return redirect() -> back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category -> delete();
        return redirect()->back();

    }
}
