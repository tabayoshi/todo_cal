<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    protected $fillable =  [
        'todo_id',
        'memo',
        'memo_flag',
    ];
}
