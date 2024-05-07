<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderDetails extends Model
{
    use HasFactory;
    protected $fillable=['shipping_id','user_id','product_id','variant_id','coupon_id','order_status','grand_total','payment_status'];
}
