<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Todo;

class TodoService
{
    public function create($request)
    {
        return auth()->user()->todo()->create([
            'name'          => $request['name'], 
            'description'   => $request['description'], 
            'for'           => $request['for'], 
            'user_id'       => auth()->user()->id,
            'completed_by'  => NULL
        ]);
    }

    public function done($id)
    {
        $todo = Todo::findOrFail($id);
        if ($todo->completed_by) return session()->flash('success', $todo->name.' Already Done.');
        session()->flash('success', $todo->name.' Marked as Completed.');
        return $todo->update([
            'completed_by' => auth()->user()->id,
            'completed_at' => Carbon::now(),
            'hidden'       => true
        ]);
    }

    public function destroy($id)
    {
        Todo::findOrFail($id)->delete();
        return session()->flash('success', 'Deleted');
    }

    public function getTodos($role)
    {
        return $this->roleResolver($role);
    }


    public function getTodosFor($role) 
    {
        return Todo::where('for', $role)->where('hidden', false)->get();
    }

    public function getAllTodos()
    {
        return Todo::all();
    }

    public function roleResolver($role)
    {
        switch ($role->name) {
            case 'columnist':
                return $this->getTodosFor($role->name);
            case 'photographer':
                return $this->getTodosFor($role->name);
            default:
                return $this->getAllTodos();
        }
    }


}