<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TodoListIndex extends Model
{
    public function user(){
        return $this->belongsTo(user::class);
    }
}
