<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    public $table = "country";

    use HasFactory;
    protected $fillable = [
        'name',
        'status',
    ];

}
