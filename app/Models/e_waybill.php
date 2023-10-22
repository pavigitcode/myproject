<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class e_waybill extends Model
{

    public $table = 'part_a(i)_e-waybill';
    // public $table = 'e_way_bill_details';

    public $timestamps = false;

    public $guarded = [];
}
