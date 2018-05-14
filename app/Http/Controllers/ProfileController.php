<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profile;
use App\User;

use Image;
use Session;
use Auth;
use Storage;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $currentUser = Auth::user()->id;
        $profile= User::find($currentUser)->profile;
        return view('profile.index')->withProfile($profile);
    }

    public function show($user_id)
    {
        $user = User::findOrFail($user_id);
        $profile = $user->profile;
        return view('profile.show')->withUser($user)->withProfile($profile);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'settlement' => 'max:30',
            'about_me' => '',
        ]);
        
        $currentUser = Auth::user();
        $profile = User::find($currentUser->id)->profile;

        $profile->about_me = $request->about_me;
        $profile->settlement = $request->settlement;

        $profile->save();
        Session::flash('success', 'Успешно редактирахте профила си!');
        return redirect()->route('profile.show', [$currentUser->id]);
    }

}
