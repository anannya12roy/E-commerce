<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotdeal extends Model
{
    use HasFactory;
    protected $fillable = [
        'frst_desp',
        'scnd_desp',
        'image'
       
    ];
}
