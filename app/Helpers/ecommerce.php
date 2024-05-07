<?php

namespace App\Helpers;
//use App\Helpers\Product;
use App\Models\country;
use App\Models\Currency;
use App\Models\ProductVariant;
use App\Models\seo;
use App\Models\Reaction;
use Auth;
use Mail;
use DB;
use App\Models\Product;
use App\Models\productpivot;
use App\Models\categories;
use App\Models\media;
use Carbon\Carbon;
//use MongoDB\Driver\Session;
use Session;

class ecommerce{




    public static function get_product($id)
    {

        $products = Product::where('id', $id)->get()->first();
return $products;
    }

    public static function Product($data)
    {

        $coupon=array();
        $product =self::ProductData($data);
        $column = isset($data['col']) ? $data['col'] : '4';
        if(isset($data['template'])){
            $template = 'frontend/snippets/'.$data['template'].'';
        }
        else{
            $template = 'frontend/snippets/coupons_loop';

        }



        return view($template,compact('product','column'));
    }


    public static function ProductData($data)
    {
        $DataCollection = [];
//dd(Session::get('currency'));
//        if(Session::get('currency') != null) {
//            $currency = Session::get('currency');
//        }
//        else
//        {
//            $currency = 226;
//        }

       if(isset($data['collection'])){
            $collection = ProductInCategory::where('slug',$data['collection'])->get()->first();
        }
        elseif(isset($data['coupon_type'])){
            $coupons = coupon::where('status', 1)->where('country_id', $coun)->where('coupon_type',$data['coupon_type'])->paginate(20);
        }else{
           $products = Product::where('status', 1)->paginate(20);
           $ProductCollection =self::ProductCollection($products);
       }
        return $ProductCollection;

    }





    public static function ProductCollection($products)
    {
        foreach ($products as $product) {
            $media = media::where('reference_id',$product->id)->where('reference_type','product')->get();
            $currenc = Currency::where('id',Settings::SelectedCurrency()->id)->first();
            if($product->is_variant == 1){
                $price =  ProductVariant::where('product_id',$product->id)->where('currency_id',Settings::SelectedCurrency()->id)->get()->first();
            }else{
                $price =  productpivot::where('product_id',$product->id)->where('currency_id',Settings::SelectedCurrency()->id)->get()->first();
            }
            if($price != null){
                $DataCollection[]=[
                    'compare_price'=>$price->compare_price,
                    'discounted_price'=>$price->discounted_price,
                    'product_id'=>$product->id,
                    'stock'=>$price->stock,
                    'title'=>$product->title,
                    'slug'=>$product->slug,
                    'media'=>$media,
                    'currency'=>$currenc,
                ];
            }
        }
        return $DataCollection;
    }



}

