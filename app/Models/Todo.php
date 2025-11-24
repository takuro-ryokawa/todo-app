<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todo extends Model
{
    protected $fillable = ['body', 'flag', 'todo_list_id'];
    use HasFactory;

    public function todoList(){
        return $this->belongsTo(TodoList::class);
    }
}
