<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Mail;

use App\Question;

class AdminQuestionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::whereNull('response')
        ->orderBy('id', 'desc')->paginate(25);
        return view('admin-questions.index')->withQuestions($questions);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        return view('admin-questions.edit')->withQuestion($question);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'response' => 'required|max:200'
        ]);

        $question = Question::find($id);
        $question->response = $request->response;
        $question->save();

        $data = [
            'email' => $question->user->email,
            'question' => $question->body,
	 	    'subject' => 'Получихте отговор на зададения въпрос!',
	 	    'bodyMessage' => $request->response
        ];
         
        Mail::send('emails.response_question', $data, function($message) use ($data){
            $message->to($data['email']);
            $message->subject($data['subject']);
        });
        
        Session::flash('success', 'Успешно отговорихте на въпроса.');

        return redirect()->route('admin.questions');
    }

}
