<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoList;
use App\Models\TodoListIndex;
use Illuminate\Support\Facades\Auth;

class TodoListIndexController extends Controller
{
    public function index()
    {
        $lists = TodoListIndex::where('user_id', Auth::id())->get();
        return view('lists.index', compact('lists'));
    }
    public function store(Request $request)
    {
        // 空のリストを一件作る（タイトルは仮）
        $list = TodoListIndex::create([
            'user_id' => Auth::id(),
            'title' => '新しいリスト'
        ]);
        // 新しいリストの個別Todo画面へ飛ぶ
        return redirect()->route('todos.index', ['index' => $list->id]);
    }
    public function update(TodoListIndex $index, Request $request){
        $validated = $request->validate([
            'title' => 'required|string|max:50'
        ]);
        $index->title = $validated['title'];
        $index->save();
        return back();
    }
    public function destroy(TodoListIndex $index)
    {
        $index->todoLists()->delete();
        $index->delete();
        return redirect()->route('lists.index');
    }
}
