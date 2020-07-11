<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $todos = Todo::all();
        return view('todos.index')->with('todos',$todos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
             'name' => 'required',
             'description' => 'required'
         ]);
        $todo = new Todo;
        
        $todo->name = $request->name;
        $todo->description = $request->description;
        $todo->completed=false;
        $todo->save();
        
        session()->flash('sucess','Todo Created Sucessfully');
       

       return redirect('/todos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return view('todos.show',compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view('todos.edit',compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required'
        ]);

       
       
       $todo->name = $request->name;
       $todo->description = $request->description;
       $todo->completed=false;
       $todo->save();
       session()->flash('sucess','Todo Updated Sucessfully');

       return redirect('/todos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($todoId)
    {
        $todo = Todo::find($todoId);
        
        $todo->delete();
        session()->flash('sucess','Todo Deleted Sucessfully');
        return redirect('/todos');

    }
    public function complete($id)
    {
        $todo = Todo::find($id);
        $todo->completed = true;
        $todo->save();

        session()->flash('sucess','Todo Completed Successfully');
        return redirect('/todos');
    }
}
