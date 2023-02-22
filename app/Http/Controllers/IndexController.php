<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public  function index()
    {
        $books = Books::query()->orderByDesc('created_at')->get();

        return view('index', [
            'books' => $books
        ]);
    }

    public  function sign_in()
    {
        return view('sign_in');
    }

    public function add()
    {
        $categories = Categories::all();

        return view('add', [
            'categories' => $categories
        ]);
    }

    public  function update(Books $books)
    {
        $categories = Categories::all();

        return view('update', [
            'categories' => $categories,
            'books' => $books
        ]);
    }

//    public function user(User $user)
//    {
//        return
//    }
}




