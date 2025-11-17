<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoList;
use App\Models\TodoListIndex;
use Illuminate\Support\Facades\Auth;

class TodoListController extends Controller
{
    public function index(TodoListIndex $index)
    {
        $todos = $index->todoLists()->get();
        return view('todos.index', compact('index', 'todos'));
    }
    public function store(TodoListIndex $index, Request $request)
    {

    }
    public function edit($todo)
    {

    }
    public function update(Request $request, $todo)
    {

    }
    public function toggle($todo)
    {

    }
    public function destroy($todo)
    {

    }
}
