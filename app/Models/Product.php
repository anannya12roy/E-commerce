<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category',
        'size',
        'color',
        'price',
        'discount_price',
        'image',
        'status',
        'hot_deal',
        'description',
    ];
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'orders');
    }

}
