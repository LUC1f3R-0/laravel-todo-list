<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function todo(Request $request)
    {
        $toDo = [

            'date' => $request->dt,
            'task' => $request->ts,
        ];

        Todolist::create($toDo);
        return redirect()->back();
    }

    public function ShowData()
    {
        $data = Todolist::all();
        return view('welcome',['lists'=>$data]);
    }

    public function delete($toid)
    {

        $todo = TodoList::find($toid);
        if ($todo) {
            $todo->delete();
        }
        return redirect()->back();
    }
}


