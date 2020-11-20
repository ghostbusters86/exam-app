<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    protected $table = 'questions';

    protected $fillable = [
        'id',
        'question',
        'a',
        'b',
        'c',
        'd',
        'e',
        'answer',
        'created_at',
        'updated_at'
    ];
}
