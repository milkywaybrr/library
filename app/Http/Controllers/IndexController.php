<?php

namespace App\Http\Controllers;

use App\Models\Books;
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
        return view('add');
    }
}
