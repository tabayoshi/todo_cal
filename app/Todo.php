<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'id',
        'todo',
        'deadline',
    ];

    public function memos()
    {
        return $this->hasMany(MEMO::class);
        // return $this->belongsTo(MEMO::class);
    }
}
