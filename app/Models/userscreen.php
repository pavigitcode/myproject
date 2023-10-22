<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userscreen extends Model
{
    public $table = 'user_screen';
    // public $table = 'screen_sections';

    
    public $timestamps = false;

    public $guarded = [];
}
