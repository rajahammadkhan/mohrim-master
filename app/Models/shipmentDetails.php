<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipmentDetails extends Model
{
    use HasFactory;

     protected $fillable =[

         'ship_type',
         'order_id',
         'shipping_first_name',
         'shipping_last_name',
         'shipping_country',
         'shipping_zip_code',
         'shipping_street_address',
         'shipping_apartment_detail',
         'shipping_city',
         'shipping_state',
         'shipping_phone',
         'billing_first_name',
         'billing_last_name',
         'billing_country',
         'billing_zip_code',
         'billing_street_address',
         'billing_apartment_detail',
         'billing_city',
         'billing_state',
         'billing_phone',
       ];
     
     
    public $timestamps = false;

}

