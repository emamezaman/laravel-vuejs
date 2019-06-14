<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\Mail\CommentMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
     public function __construct()
    {
      $this->middleware('auth')->only('store');
    }
    
    public function store(Article $article)
    {
        $this->validate(request() , [
            'body' => 'required|min:5'
        ]);

        $user = auth()->user();

        $article->comments()->create([
            'user_id' => $user->id,
            'body' => request('body')
        ]);


        Mail::to($user->email)->send(new CommentMail($user));

        return back();
    }
}
