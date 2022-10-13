<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class QuizController extends Controller
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
    public function index(Quiz $quiz)
    {
        $quizzes = $quiz -> all();
        return view('quizzes.index',compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Quiz $quiz)
    {
        $categories = Category::select(['id','title'])->get();
        return view('quizzes.create',compact('categories'));
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

        $FILE = $request->file('image')->store('public/quizzes');


        if($FILE) {
            $fileName = explode('/',$FILE)[2];
            Quiz::create(['title'=>$request->title,'image' => $fileName,'category_id' => $request -> categories,'user_id'=>Auth::id()]);
        }

        return redirect()->to('quizzes');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        $item = [
            'id' => $quiz->id,
            'title' => $quiz->title,
            'image' => $quiz->image,
        ];
        return view('quizzes.edit',['quiz'=> $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        $request -> validate([
            'title'=>'required | min:3 | max: 50',
            'image' => [
                File::types(['jpg','png','svg'])
            ]
        ]);



        if($request -> title  != old('title')) {
            $quiz -> update(['title'=> $request->title]);
        }

        if($request -> file('image') != null) {

            Storage::disk('public')->delete('quizzes/' . $quiz->image);
            $FILE = $request->file('image')->store('public/quizzes');



            if($FILE) {
                $fileName = explode('/', $FILE)[2];
                $quiz -> update([
                    'image' => $fileName
                ]);
            }

        }



        return redirect() -> back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        $quiz -> delete();
        return redirect()->back();

    }
}
