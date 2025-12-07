<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\TodoList;
use Illuminate\Support\Facades\Auth;

class TodoListController extends Controller
{
    public function index()
    {
        $lists = TodoList::where('user_id', Auth::id())->orderBy('updated_at','desc')->get();
        return view('lists.index', compact('lists'));
    }
    public function store(Request $request)
    {
        // 空のリストを一件作る（タイトルは仮）
        $list = TodoList::create([
            'user_id' => Auth::id(),
            'title' => ''
        ]);
        // 新しいリストの個別Todo画面へ飛ぶ
        return redirect()->route('todos.index', ['list' => $list->id]);
    }
    public function update(TodoList $list, Request $request){
        $validated = $request->validate([
            'title' => 'nullable|string|max:50'
        ]);
        $list->title = $validated['title'] ?? '';
        $list->save();
        return back();
    }
    public function destroy(TodoList $list)
    {
        $list->todos()->delete();
        $list->delete();
        return redirect()->route('lists.index');
    }
}
