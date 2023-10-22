<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shift extends Model
{
    public $table = 'shift';

    public $timestamps = false;

    public $guarded = [];
}
