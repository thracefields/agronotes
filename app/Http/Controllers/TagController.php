<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Tag;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin', ['except' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('id', 'desc')->paginate(10);
        return view('tags.index')->withTags($tags);
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
            'name' => 'required|max:30'
        ]);

        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();

        Session::flash('success', 'Успешно добавихте нов таг!');

        return redirect()->route('tags.index');
    }

   /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::findOrFail($id);
        $articles = $tag->articles()->paginate(10);
        return view('tags.show')->withTag($tag)
            ->withArticles($articles);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('tags.edit')->withTag($tag);
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
            'name' => 'required|max:30'
        ]);

        $tag = Tag::findOrFail($id);
        $this->validate($request, ['name' => 'required|max:255']);
        $tag->name = $request->name;
        $tag->save();
        Session::flash('success', 'Успешно променихте тага!');
        return redirect()->route('tags.index', $tag->id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->articles()->detach();
        $tag->delete();
        Session::flash('success', 'Тагът беше изтрит успешно!');
        return redirect()->route('tags.index');
    }
}
