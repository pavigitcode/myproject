<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usertype extends Model
{
    public $table = 'user_type';

    public $timestamps = false;

    public $guarded = [];
}
