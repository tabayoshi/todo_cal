<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    protected $fillable =  [
        'id',
        'todo_id',
        'memo',
        'memo_flag',
    ];

    public function todos()
    {
        return $this->belongsTo(Todo::class);
        // return $this->hadMany(Todo::class);
    }
}
