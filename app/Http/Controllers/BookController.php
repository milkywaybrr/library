<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public  function destroy()
    {

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'name' => 'required',
           'text' => 'required|min:20',
           'file' => 'mimes:png,jpg,jpeg',
           'category_id' => 'required'
        ], [
            'name.required' => 'Введите название',
            'text.required' => 'Введите описание',
            'text.min' => 'Описание не менее 20 символов',
            'category_id.required' => 'Выберите категорию'
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->all());
        }

        $image_path = null;

        if($request->file('file')) {
            $image_path = $request->file('file')->store('public/image');
        }

        Books::query()->create([
           'image_path' => $image_path,
           'author_id' => Auth::user()->id,
        ] + $validator->validated());

        return redirect()->route('home');
    }

    public  function show($id)
    {
        $books = Books::query()->find($id);

        if($books === null) {
            return redirect()->route('home');
        }

        return view('single', [
            'books' => $books
        ]);
    }
}
