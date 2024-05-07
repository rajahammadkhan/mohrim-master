<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    public $table = "testimonials";

    use HasFactory;
    protected $fillable = [
        'name', 'status','designation','comment','profile','orderby'
    ];

}
