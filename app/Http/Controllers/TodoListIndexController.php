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

    }
    public function destroy(TodoLostIndex $index)
    {
        
    }
}
