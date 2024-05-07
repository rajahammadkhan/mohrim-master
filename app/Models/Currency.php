<?php

namespace App\Models;
use App\Models\country;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{

    protected $with = ['countries'];

    use HasFactory;
    protected $fillable = [
        "status",
        "bydefault",
        "currency_name",
        "currency_symbol",
        "currency_code",
        "currency_rate",
        "country_id",
    ];

    public function countries()
    {

        return $this->belongsTo(country::class,'country_id');
    }

}
