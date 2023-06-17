<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipdetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'rcv_name','rcv_uid','rcv_email','rcv_phone','rcv_add','rcv_city','rcv_district','zip_code'];
}
