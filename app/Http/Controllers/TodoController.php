<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\TodoList;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index(TodoList $list)
    {
        $todos = $list->todos()->get();
        return view('todos.index', compact('list', 'todos'));
    }
    // 新しいtodoを追加
    public function store(TodoList $list, Request $request)
    {
        $validated = $request->validate([
            'body' => 'required|string|max:100'
        ]);
        $list->todos()->create([
            'body' => $validated['body'],
            'flag' => 0
        ]);
        // 個別Todo画面へリダイレクト
        return redirect()->route('todos.index', ['list' => $list->id]);
    }
    public function update(Todo $todo, Request $request)
    {
        $validated = $request->validate([
            'body' => 'required|string|max:100'
        ]);
        $todo->body = $validated['body'];
        $todo->save();
        return redirect()->route('todos.index',[
            'list' => $todo->todo_list_id
        ]);
    }
    public function toggle(Todo $todo)
    {
        $todo->flag = $todo->flag ? 0 : 1;
        $todo->save();
        return back();
    }
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return back();
    }
}
