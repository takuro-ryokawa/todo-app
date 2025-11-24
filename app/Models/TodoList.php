<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Todo;


class TodoList extends Model
{
    protected $fillable = ['user_id', 'title'];
    use HasFactory;

    public function todos(){
        return $this->hasMany(Todo::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
