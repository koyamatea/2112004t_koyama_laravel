<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // 追加
    protected $fillable = [
        'idd',
    ];
}
