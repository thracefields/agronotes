<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Article;

use Session;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin', ['except' => ['sortArticlesByCategory']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(10);
        return view('categories.index')->withCategories($categories);
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
            'name' => 'required|max:20'
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->save();

        Session::flash('success', 'Успешно добавихте нова категория!');

        return redirect()->route('categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit')->withCategory($category);
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

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();
        Session::flash('success', 'Успешно променихте категорията!');
        return redirect()->route('categories.index');
    }

    public function sortArticlesByCategory($category_id)
    {
        $category = Category::find($category_id);
        $articles = Article::where('category_id', $category_id)->paginate(10);
        return view('articles.category')->withArticles($articles)->withCategory($category);    
    }
}
