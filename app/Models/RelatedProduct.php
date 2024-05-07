<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelatedProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'parent_id',
        'product_id',
        'option_name',
        'status',
    ];

    public function username()
    {

        return $this->belongsTo(User::class,'user_id');
    }
}
