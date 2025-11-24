<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class TodoListIndex extends Model
{
    protected $fillable = ['user_id', 'title'];
    use HasFactory;

    public function todoLists(){
        return $this->hasMany(TodoList::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
