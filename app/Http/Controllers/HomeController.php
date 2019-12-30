<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TodoService;
use App\Http\Requests\StoreTodo;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TodoService $todo)
    {
        $this->middleware('auth');
        $this->todo = $todo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = auth()->user()->roles()->first();
        $todos = $this->todo->getTodos($role);
        
        return view('home', [
            'todos' => $todos
        ]);
    }

    public function storeTodo(StoreTodo $request)
    {
        $this->todo->create($request->all());
        return redirect()->back();
    }

    public function doneTodo($id)
    {
        $this->todo->done($id);
        return redirect()->back();
    }

    public function destroyTodo($id)
    {
        $this->todo->destroy($id);
        return redirect()->back();        
    }

    public function devIndex()
    {
        return view('pages.dev');
    }

}
