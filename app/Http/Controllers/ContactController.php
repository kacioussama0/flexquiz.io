<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        return view('contact');
    }

    public function store(Request $request) {
        $request -> validate([
            'name' => 'required | min:3 | max: 35',
            'email' => 'required | email | max: 100',
            'message' => 'required | min: 10 | max: 100'
        ]);

        $message = Message::create($request -> all());

        if($message -> id) {
            return view('contact',['success' => __('Message Send Successfully')]);
        }

        return view('contact',['failed' => __('Message Not Sended')]);



    }

    public function  allMessages(Message $message) {
        $messages = $message -> select(['id','name','email','message'])->get();
        return view('messages',compact('messages'));
    }


    public  function  deleteMessage($id) {
        Message::find($id)->delete();
        return redirect()->to('messages');
    }

}
