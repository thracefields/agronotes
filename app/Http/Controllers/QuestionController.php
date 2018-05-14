<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Auth;

use App\Question;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUser = Auth::user();
        $questions = Question::where('user_id', $currentUser->id)
            ->orderBy('id', 'desc')->paginate(25);
        return view('questions.index')->withQuestions($questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|min:15|max:200'
        ]);

        $question = new Question;
        $question->body = $request->body;
        $question->user_id = Auth::user()->id;
        $question->save();

        Session::flash('success', 'Успешно зададохте въпрос!');

        return redirect()->route('questions.index');
    }
}
