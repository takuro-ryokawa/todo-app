<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    public function todoListIndex(){
        return $this->belongsTo(TodoListIndex::class);
    }
}
