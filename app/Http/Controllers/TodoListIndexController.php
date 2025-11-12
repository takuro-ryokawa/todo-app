<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoListIndexController extends Controller
{
    public function index(){
        return view('lists.index');
    }

}
