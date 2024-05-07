<?php

namespace App\Models;

use App\Models\media;
use App\Models\ProductVariant;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Whoops\Exception\ErrorException;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     *
     *
     */
     protected $with = ['category','brands','seo'];

        protected $fillable = [
            'title',
            'product_tax',
            'slug',
            'short_description',
            'long_description',
            'status',
            'stock',
            'is_variant',
            'product_tag',
            'continue_selling',
            'chart_id',
            'country_id',
            'compare_price',
            'discounted_price',
        ];

//    public function productMedia()
//    {
//        $leagues = DB::table('products')
//            ->join('media', 'products.id', '=', 'media.reference_id')
//            ->where('media.reference_type', 'product')
//            ->select('products.*','media.image')
//            ->get();
//
//        return $leagues;
//
//    }

//    public function productDetail()
//    {
//        return $this->belongsToMany('App\Models\ProductVariant','id','product_id');
//      }

    public function category()
    {

        return $this->hasmany(ProductInCategory::class,'product_id','id');
    }

    public function media()
    {

        return $this->hasmany(media::class,'reference_id','id');
    }
         public function brands()
            {

                return $this->belongsTo(ProductIsBrand::class,'id','product_id');
            }



    public function seo()
    {
        return $this->belongsTo('App\Models\seo', 'id', 'reference_id');

    }

//        $seos = DB::table('seos')
//            ->where('reference_type','product')
//            ->get();
    public function seodetail()
    {
        $posts = Product::whereHas('seo', function ($query) {
            $query->where('reference_type', 'products');
        })->get();


    }

//        return $this->belongsTo($seos, 'reference_id
//        ');

//            ->where('id','reference_id');


//        $rows = DB::select(DB::raw($sql));
//
//        // (PSUEDO CODE) THIS IS WHAT I'D LIKE TO DO IDEALY
//        return $this->belongsTo($rows, user_id);







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
