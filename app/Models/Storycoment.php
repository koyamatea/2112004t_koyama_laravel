<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Storycoment extends Model
{
    protected $fillable = [
        'idd',
        'title',
        'story',
        'coment',
    ];
}
