<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;
    protected $fillable=[
        "product_id",
        "chart_id",
        "currency_id",
        "country_id",
        "category_id",
        "brand_id",
        "variant_options",
        "compare_price",
        "discounted_price",
        "quantity",
        "image",
        "sku",
    ];
}
