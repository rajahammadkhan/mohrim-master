<?php

namespace App\Helpers;
use App\Helpers\Product;
use App\Models\country;
use App\Models\seo;
use App\Models\store;
use App\Models\Reaction;
use Auth;
use Mail;
use DB;
use App\Models\coupon;
use App\Models\categories;
use App\Models\media;
use Carbon\Carbon;
//use MongoDB\Driver\Session;
use Session;

class Product{

    public static function Country()
    {
        $data = country::where('status',1)->get();
        return $data;
    }
    public static function SelectedCountry()
    {
        if(Session::get('country') != null)
            $coun = Session::get('country');
        else{
            $coun = 226;
        }
        $data = country::where('id',$coun)->get()->first();
        return $data;
    }
    public static function Categories($name = null)
    {
        if($name != null) {
            return categories::where('status', 1)->where('reference_type', $name)->get();
        }else{
            return categories::where('status', 1)->get();
        }
    }
    public static function Coupons($data)
    {
        $coupon=array();

        $coupons =self::CouponsData($data);
        if($coupons) {
            foreach ($coupons as $row) {

                $current_date = date('Y-m-d ');
                $currentDate = date('Y-m-d', strtotime($current_date));
                $startDate = date('Y-m-d', strtotime($row->start_date));
                $endDate = date('Y-m-d', strtotime($row->expiry_date));


                if($startDate <= $currentDate && $currentDate <= $endDate)  {

                    $seo = seo::where(['reference_type' => 'coupon', 'reference_id' => $row->id])->get()->first();
                    $reaction = Reaction::where(['type' => 'comment', 'reference_type' => 'coupon', 'reference_id' => $row->id])->get();
                    $media = media::where(['reference_type' => 'coupon', 'reference_id' => $row->id])->get();
                    $country = country::where(['id' => $row->country_id])->get()->first();
                    $category = categories::where('id',$row->category_id)->first();



                    $coupon[] = [
                        'basic' => $row,
                        'media' => $media,
                        'seo' => $seo,
                        'country' => $country,
                        'comment' => count($reaction),
                        'category' => $category,
                    ];
                }
                else
                {

                }

            }
        }
        $column = isset($data['col']) ? $data['col'] : '4';

        if(isset($data['template'])){
            $template = 'frontend/snippets/'.$data['template'].'';
        }
        else{
            $template = 'frontend/snippets/coupons_loop';

        }



        return view($template,compact('coupon','column'));
}



    public static function Seacrh($data)
    {
        if(isset($data['search']) && $data['search'] == true){
            dd('search');
        }
    }





//    Coupon Data
    public static function CouponsData($data)
    {



        if(Session::get('country') != null)
            $coun = Session::get('country');
        else{
            $coun = 226;
        }
        if (isset($data['graph']) && isset($data['type'])) {
            $coupons = coupon::where('status', 1)->where('country_id', $coun)->whereJsonContains('coupon_graph', $data['graph'])->where('coupon_type',$data['type'])->get();
        }
            elseif (isset($data['graph'])) {
                $coupons = coupon::where('status', 1)->where('country_id', $coun)->whereJsonContains('coupon_graph', $data['graph'])->get();
            }elseif(isset($data['collection'])){
                $collection = categories::where('slug',$data['collection'])->get()->first();
                if($collection){
                $coupons = coupon::where('status', 1)->where('country_id', $coun)->where('category_id',$collection->id)->paginate(0);
                }else{
                   return false;

                }
            }elseif(isset($data['stores'])){
                $store = store::where('slug',$data['stores'])->get()->first();
                $coupons = coupon::where('status', 1)->where('country_id', $coun)->where('store_id',$store->id)->paginate(20);

            }
            elseif(isset($data['coupon_type'])){
                $coupons = coupon::where('status', 1)->where('country_id', $coun)->where('coupon_type',$data['coupon_type'])->paginate(20);
            }
            return $coupons;

    }


}

