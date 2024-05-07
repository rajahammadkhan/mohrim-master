<?php

namespace App\Helpers;
use App\Helpers\Settings;
use App\Models\country;
use App\Models\Currency;
use Auth;
use Mail;
use DB;
use Session;
class Settings{
    public static function ThemeSettings($optionkeys,$choose =null)
    {
        if(isset($choose)){
      $data = DB::table('settings')->where('option_key',$optionkeys)->where('choose',$choose)->get()->first();
      if($data){return  true;}else{return  false;}

        }else{
            $data = DB::table('settings')->where('option_key',$optionkeys)->get()->first();
            return  $data;
        }
    }


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
    public static function Currency()
        {
            $data = Currency::where('status',1)->get();
            return $data;
        }
    public static function SelectedCurrency()
    {
        if(Session::get('currency') != null)
        $coun = Session::get('currency');
        else{

            $data = Currency::where('bydefault',1)->get()->first();
            $coun = $data->id;
        }
        $data = Currency::where('id',$coun)->get()->first();
        return $data;
    }


    public static function Section($name)
    {
        $view = 'frontend/sections/'.$name;
        return view($view);
    }
    public static function Snippet($name,$data = null)
    {
        $view = 'frontend/snippets/'.$name;
        return view($view,compact('data'));
    }



    public static function CommentBox($ReferenceType,$ReferenceId)
    {
        return view('frontend/snippets/comment-box',compact('ReferenceType','ReferenceId'));
    }
    public static function CommentList($ReferenceType,$ReferenceId)
    {

     $data = DB::table('reactions')->where('type','comment')->where('reference_type',$ReferenceType)->where('reference_id',$ReferenceId)->get();
        return view('frontend/snippets/comment-list',compact('data','ReferenceType'));
    }
    public static function LikeWidget($ReferenceType,$ReferenceId)
    {

        $data = DB::table('reactions')->where('type','like')->where('reference_type',$ReferenceType)->where('reference_id',$ReferenceId)->get();
        if(Auth::check()){


        $already = DB::table('reactions')
            ->where('user_id',auth()->user()->id)
            ->where('type','like')
            ->where('reference_type',$ReferenceType)
            ->where('reference_id',$ReferenceId)->get();
        }else{
            $already =[];
        }
        return view('frontend/snippets/like-widget',compact('data','ReferenceType','ReferenceId','already'));
    }


    public static function WishList($ReferenceType,$ReferenceId)
    {
        $data = DB::table('reactions')->where('type','wishlist')->where('reference_type',$ReferenceType)->where('reference_id',$ReferenceId)->get();
        if(Auth::check()) {
            $already = DB::table('reactions')
                ->where('user_id', auth()->user()->id)
                ->where('type', 'wishlist')
                ->where('reference_type', $ReferenceType)
                ->where('reference_id', $ReferenceId)->get();
        }else{
            $already =[];
        }
        return view('frontend/snippets/wishlist-widget',compact('data','ReferenceType','ReferenceId','already'));
    }
}

