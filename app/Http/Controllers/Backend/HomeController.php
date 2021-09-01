<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Comment;
use App\Models\User;

class HomeController extends BackEndController
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function index() {
        $comments = Comment::with('user' , 'video')->orderby('id' , 'desc')->paginate(20);
        return view('backEnd.home', compact('comments'));
    }
}
