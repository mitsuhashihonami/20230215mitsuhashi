<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $todos = Todo::all();
        $tags = Tag::all();
        $param = ['todos' => $todos, 'user' => $user, 'tags' => $tags];

        return view('index', $param);
    }



    public function create(TodoRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        $todo = Todo::create($form);
        $user = Auth::user();
        $todo->user_id = $user->id;
        $todo->save();
        return redirect('/home');
    }
    public function find()
    {
        $user = Auth::user();
        $todos = Todo::all();
        $tags = Tag::all();
        $param = [
            'todos' => $todos, 
            'user' => $user, 
            'tags' => $tags,
            'input' => ''
        ];

        return view('search', $param);
    }

    public function search(Request $request)
    {
        $todos = Todo::where('name', 'LIKE BINARY', "%{$request->input}%")->get();
        $tags = Tag::all();
        $user = Auth::user();
        $param = [
            'input' => $request->input,
            'tags' => $tags,
            'user' => $user,
            'todos' => $todos
        ];
        return view('search', $param);
    }


    public function update(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Todo::where('id', $request->id)->update($form);
        return redirect('/home');
    }

    public function delete(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/home');
    }
}
