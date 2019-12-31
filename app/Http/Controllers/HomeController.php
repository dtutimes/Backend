<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TodoService;
use App\Http\Requests\StoreTodo;
use App\Models\Story;
use Illuminate\Support\Carbon;


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
            'todos' => $todos,
            'total' => $this->getMonthlyCount(),
            'draft'   => $this->getMonthlyCount('draft'),
            'pending'   => $this->getMonthlyCount('pending'),
            'published'   => $this->getMonthlyCount('published')
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

    public function getMonthlyCount($status = null)
    {
        if ($status) {
            $stories = Story::select('id', 'created_at')->where('status', $status)
            ->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });
        } else {
            $stories = Story::select('id', 'created_at')
            ->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });
        }

        $temp = [];
        $count = [];
        foreach ($stories as $key => $value) {
            $temp[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($temp[$i])){
                $count[$i] = $temp[$i];    
            }else{
                $count[$i] = 0;    
            }
        }

        return $count;
    }

}
