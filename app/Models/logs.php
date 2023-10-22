<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logs extends Model
{
    public $table = 'logs';

    public $timestamps = false;

    public $guarded = [];
}
