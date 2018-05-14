<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tip;

use Session;

class TipController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin', ['except' => ['getTips']]);
    }

    public function getTips(Request $request)
    {
        if(request()->ajax()) {
            $tips = Tip::where('month', $request->id)->take(15)->get();
            return response()->json($tips);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $tips = Tip::orderByDesc('id')->paginate(30);
        return view('tips.index')->withTips($tips);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tips.create');
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
            'body' => 'required|max:300',
            'month' => 'required'
        ]);

        $tip = new Tip;
        $tip->body = $request->body;
        $tip->month = $request->month;

        $tip->save();

        Session::flash('success', 'Успешно добавихте съвет.');
        return redirect()->route('tips.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tip = Tip::findOrFail($id);
        return view('tips.edit')->withTip($tip);
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
            'body' => 'required|max:300',
            'month' => 'required|integer|min:1|max:12'
        ], [
            'month.min' => 'Невалидна стойност.',
            'month.max' => 'Невалидна стойност.'
        ]);

        $tip = Tip::findOrFail($id);
        $tip->body = $request->body;
        $tip->month = $request->month;
        $tip->save();

        Session::flash('success', 'Успешно редактирахте съвета.');

        return redirect()->route('tips.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tip = Tip::find($id);
        $tip->delete();
        Session::flash('success', 'Успешно изтрихте съвета.');
        return redirect()->route('tips.index');
    }
}
