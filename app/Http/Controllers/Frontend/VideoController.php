<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\seo;
use Session;
use App\Models\coupon;
use App\Models\media;
use App\Models\Videoshow;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $data = Videoshow::where('status',1)->with('user')->get();

        return view('frontend.video.index',compact('data'));
    }
    public function show($slug)
    {

        $data['video'] = Videoshow::where('status',1)->where('slug',$slug)->with('user')->get()->first();
        $data['seo'] = seo::where('reference_id', $data['video']->id)->where('reference_type','video')->get()->first();
        return view('frontend.video.show',$data);
    }
    public function countrysort($id)
    {
        if(Session::get('country') == null){
            Session::put('country', $id);
        }else{
            Session::forget('country');
            Session::put('country', $id);

        }


        return redirect()->back();
    }



}
