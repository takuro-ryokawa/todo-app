<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TodoList extends Model
{
    protected $fillable = ['body', 'flag', 'todo_list_index_id'];
    use HasFactory;

    public function todoListIndex(){
        return $this->belongsTo(TodoListIndex::class);
    }
}
