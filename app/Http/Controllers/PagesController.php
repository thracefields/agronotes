<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Article;
use App\Category;

use Mail;
use Session;

class PagesController extends Controller
{
    public function getWelcome()
    {
        $articles = Article::orderBy('id', 'desc')->take(10)->get();
        $featuredArticles = Article::all()->sortByDesc('page_views')->take(2);
        return view('welcome')->withArticles($articles)->withFeaturedArticles($featuredArticles);
    }

    public function getUsers()
    {
        $users = User::orderByDesc('id')->paginate(20);
        return view('users')->withUsers($users);
    }

    public function getContact()
    {
        return view('contact');
    }

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'required|min:3',
            'message' => 'required|min:10'
        ]);

        $data = [
            'email' => $request->email,
	 	    'subject' => $request->subject,
	 	    'bodyMessage' => $request->message
        ];
         
        Mail::send('emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('thracefields@gmail.com');
            $message->subject($data['subject']);
        });
        
        Session::flash('success', 'Успешно изпратихте имейл!');

        return redirect('/');
    }

    public function getSearch(Request $request)
    {
        $this->validate($request, [
            'data' => 'required'
        ]);
        $data = $request->data;
        $articles = Article::where('name', 'LIKE', '%' . $data . '%')->paginate(10);
        return view('articles.search')->withArticles($articles);
    }
}
