<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use App\Models\categories;
use App\Models\country;
use App\Models\coupon;
use App\Models\blog;
use App\Models\Pages;
use App\Models\Reaction;
use App\Models\seo;
use App\Models\media;
use App\Models\store;
use App\Models\Videoshow;
use Illuminate\Http\Request;
use function GuzzleHttp\json_decode;

class SitemapController extends Controller
{
//
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->view('sitemap/sitemap')->header('Content-Type', 'text/xml');
    }

    public function coupon()
    {
         $coupons =  coupon::where('coupon_type','coupon')->where('status',1)->get();
        return response()->view('sitemap/coupons', [
            'coupons' => $coupons
        ])->header('Content-Type', 'text/xml');
    }

    public function deal()
    {
        $coupons =  coupon::where('coupon_type','deals')->where('status',1)->get();
        return response()->view('sitemap/coupons', [
            'coupons' => $coupons
        ])->header('Content-Type', 'text/xml');
    }

    public function post()
    {
        $coupons =  blog::where('status',1)->get();
        return response()->view('sitemap/coupons', [
            'coupons' => $coupons
        ])->header('Content-Type', 'text/xml');
    }

    public function pages()
    {
        $coupons =  Pages::where('status',1)->get();
        return response()->view('sitemap/coupons', [
            'coupons' => $coupons
        ])->header('Content-Type', 'text/xml');
    }

    public function video()
    {
        $coupons = Videoshow::where('status',1)->get();
        return response()->view('sitemap/coupons', [
            'coupons' => $coupons
        ])->header('Content-Type', 'text/xml');
    }

    public function collection()
    {
        $coupons = categories::where('status',1)->get();
        return response()->view('sitemap/coupons', [
            'coupons' => $coupons
        ])->header('Content-Type', 'text/xml');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


 }
