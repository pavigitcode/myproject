<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usercreation extends Model
{
   public $table = 'user_creation';

    public $timestamps = false;

    public $guarded = [];
}
