<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReviews extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'name',
        'email',
        'comment',
    ];


    public function countries()
    {

        return $this->belongsTo(ProductIsBrand::class,'id','product_id');
    }

}
