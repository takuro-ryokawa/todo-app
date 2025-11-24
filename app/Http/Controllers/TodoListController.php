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
    // 新しいtodoを追加
    public function store(TodoListIndex $index, Request $request)
    {
        $validated = $request->validate([
            'body' => 'required|string|max:100'
        ]);
        $index->todoLists()->create([
            'body' => $validated['body'],
            'flag' => 0
        ]);
        // 個別Todo画面へリダイレクト
        return redirect()->route('todos.index', ['index' => $index->id]);
    }
    public function update(TodoList $todo, Request $request)
    {
        $validated = $request->validate([
            'body' => 'required|string|max:255'
        ]);
        $todo->body = $validated['body'];
        $todo->save();
        return redirect()->route('todos.index',[
            'index' => $todo->todo_list_index_id
        ]);
    }
    public function toggle(TodoList $todo)
    {
        $todo->flag = $todo->flag ? 0 : 1;
        $todo->save();
        return back();
    }
    public function destroy(TodoList $todo)
    {
        $todo->delete();
        return back();
    }
}
