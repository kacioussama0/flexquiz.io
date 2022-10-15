<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{

    public function index()
    {
        return redirect()->back();
    }


    public function create($id)
    {

        if(Quiz::find($id) === null) {
            abort(404);
        }
        return view('questions.create');
    }


    public function store(Request $request, $quiz , Quiz $quizzes)
    {

        $request-> validate(
            [
                'title' => 'required',
                'question-1' => 'required',
                'question-2' => 'required',
                'question-3' => 'required',
                'answer'=> 'required',
                'point' => 'required|min:1|max:10'

            ]
        );

        $questions = [
            $request['question-1'],
            $request['question-2'],
            $request['question-3'],
            $request['question-4'],
            $request['question-5'],
            $request['question-6'],
        ];


        $user = Auth::id();

      $quizzes->find($quiz)->questions()->create(
          [
              'title' => $request -> title,
              'answer' => $request -> answer,
              'questions' => json_encode($questions),
              'user_id' => $user,
              'point' => $request->point
          ]
      );

        return redirect()->to("questions/$quiz");


    }

    public function show($id)
    {
        if(Quiz::find($id) == null) {
            abort(404);
        }
        $questions = Quiz::find($id)-> questions() -> get();
        return view('questions.show',compact('id','questions'));
    }


    public function edit(Question $question)
    {
        return view('questions.edit',compact('question'));
    }


    public function update(Request $request, Question $question)
    {

        $request-> validate(
            [
                'title' => 'required',
                'question-1' => 'required',
                'question-2' => 'required',
                'question-3' => 'required',
                'answer'=> 'required',

            ]
        );

        $questions = [
            $request['question-1'],
            $request['question-2'],
            $request['question-3'],
            $request['question-4'],
            $request['question-5'],
            $request['question-6'],
        ];


        $user = Auth::id();

        $question->update(
            [
                'title' => $request -> title,
                'answer' => $request -> answer,
                'questions' => json_encode($questions),
                'user_id' => $user
            ]
        );

        return redirect()->back();

    }


    public function destroy(Question $question)
    {
        $question -> delete();
        return redirect() -> back();
    }
}
