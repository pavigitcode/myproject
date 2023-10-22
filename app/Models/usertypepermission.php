<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usertypepermission extends Model
{
    public $table = 'user_screen_permission';
    // public $table = 'screen_sections';
 
    
    public $timestamps = false;

    public $guarded = [];
    use HasFactory;
}
