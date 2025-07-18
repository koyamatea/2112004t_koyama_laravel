<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story2coment extends Model
{
    protected $fillable = [
        'idd',
        'title',
        'edit_title',
        'story',
        'edit_story',
        'delete_story',
        'coment',
        'edit_coment',
        'tocoment',
        'delete_coment',
        'image1',
        'image2',
    ];
}
