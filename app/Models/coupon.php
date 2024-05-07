<?php

namespace App\Models;
use App\Models\media;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    use HasFactory;

    protected $with = ['productMedia'];
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'affiliate_url',
        'country_id',
        'category_id',
        'image',
        'short_description',
        'long_description',
        'status',
        'store_id',
        'start_date',
        'expiry_date',
        'coupon_graph',
        'fullfilled',
        'coupon_type',
        'coupon_code',
        'discount',
        'regular_price',
        'compare_price',
    ];

    public function productMedia()
    {
        return $this->hasmany(media::class,'reference_id','id');
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($product) {
            $product->slug = $product->createSlug($product->title);
            $product->save();
        });
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    private function createSlug($title){
        if (static::whereSlug($slug = Str::slug($title))->exists()) {
            $max = static::whereTitle($title)->latest('id')->skip(1)->value('slug');

            if (is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function ($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }

            return "{$slug}-2";
        }

        return $slug;
    }


}

