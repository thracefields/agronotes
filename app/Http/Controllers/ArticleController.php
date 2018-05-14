<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Image;
use Storage;
use Purify;
use Auth;
use Carbon\Carbon;

use App\Article;
use App\Category;
use App\User;
use App\Tag;

class ArticleController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin', ['except' => ['index', 'show', 'comment']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->paginate(16);
        $categories = Category::all();

        return view('articles.index')
            ->withArticles($articles)
            ->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articles = Article::paginate(15);
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.create')->withArticles($articles)
        ->withCategories($categories)
        ->withTags($tags);
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
            'name' => 'required|max:60',
            'description' => 'required',
            'featured_image' => 'nullable|image'
        ]);

        $article = new Article;

        $article->name = $request->input('name');
        $article->description = Purify::clean($request->input('description'));
        $article->category_id = $request->category;

        if($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/uploads/' . $filename);

            Image::make($image)->resize(600, 400)
            ->save($location);

            $article->image = $filename;
        } else {
            $article->image = 'no-image.png';
        }

        $article->save();

        $article->tags()->sync($request->tags, false);

        Session::flash('success', 'Успешно добавихте нова статия.');

        return redirect()->route('articles.show', $article->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articles = Article::orderBy('id', 'desc')->take(6)->get();
        $article = Article::findOrFail($id);
        $comments = $article->comments()->orderBy('id', 'desc')->paginate(15);
        $article->addPageViewThatExpiresAt(Carbon::now()->addHours(2));
        return view('articles.show')->withArticle($article)->withArticles($articles)->withComments($comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $article = Article::findOrFail($id);
        return view('articles.edit')->withArticle($article)
        ->withCategories($categories)
        ->withTags($tags);
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
            'name' => 'required|max:60',
            'description' => 'required',
            'featured_image' => 'nullable|image'
        ]);

        $article = Article::find($id);
        $article->name = $request->input('name');
        $article->description = Purify::clean($request->input('description'));

        $article->category_id = $request->category;

        if($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/uploads/' . $filename);

            Image::make($image)->resize(600, 400)
            ->save($location);

            $oldFilename = $article->image;
            $article->image = $filename;
            $condition = $oldFilename === 'no-image.png';
            if(!$condition) { 
                Storage::delete($oldFilename);
            }
        }
        $article->save();
        if(isset($request->tags)) {
            $article->tags()->sync($request->tags);
        } else {
            $article->tags()->sync([]);            
        }
        Session::flash('success', 'Промените са запазени.');

        return redirect()->route('articles.show', $article->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->tags()->detach();
        $article->comments()->forceDelete();
        $article->views()->forceDelete();

        $filename = $article->image;
        $condition = $filename === 'no-image.png';
        if(!$condition) { 
            $location = public_path('images/uploads/' . $filename);
            Storage::delete($filename);
        }

        $article->delete();
        
        Session::flash('success', 'Успешно изтрихте статията.');
        return redirect()->route('articles.index');
    }

    public function comment(Request $request, $article_id)
    {   
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'honeypot_name' => 'honeypot',
            'honeypot_time' => 'required|honeytime:5'
        ]);

        $user = Auth::user();
        $article = Article::find($article_id);


        $comment = $article->comment([
            'title' => $request->title,
            'body' => $request->body,
        ], $user);

        return redirect()->route('articles.show', $article_id);
    }

    public function admin() {
        $articles = Article::orderBy('id', 'desc')->paginate(15); 
        return view('articles.admin')->withArticles($articles);
    }
}