<?php

namespace App\Http\Controllers\Management;
use App\Http\Controllers\Controller;

use App\Models\seo;
use App\Models\Testimonial;
use App\Models\media;
use Illuminate\Http\Request;
use PHPUnit\Util\Test;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        if(!auth()->user()->hasPermissionTo('testimonial-list')){
//            return abort(401);
//        }

        $data = Testimonial::leftJoin('media', function($join) {
            $join->on('testimonials.id', '=', 'media.reference_id');
        })
            ->where('reference_type','=','testimonial')
            ->select('testimonials.id','testimonials.name','testimonials.designation','testimonials.comment','testimonials.status','testimonials.orderby','media.image')
            ->get();

        return view('management/testimonial/index',compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->hasPermissionTo('testimonial-create')){
            return abort(401);
        }
        return view('management/testimonial/create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->hasPermissionTo('testimonial-create')){
            return abort(401);
        }
//        $validatedData = $request->validate([
//            'image' => 'required',
//
//        ]);
//dd($request);
        if ($request->file('image')) {
            $mainext = $request->file('image')->getClientOriginalExtension();
            $main_file = 'testimonial'.time() . rand(1000, 14000000000) . '.' . $mainext;
            $request->image->move(public_path('images/media'), $main_file);
        } else {
            $main_file = null;
        }

        $image_url = asset('images/media/'.$main_file);

        $data = [
            'name' =>  $request->name,
            'designation' =>  $request->designation,
            'comment' =>  $request->comment,
            'orderby' => $request->orderby,
            'status' => $request->status,
        ];
        $slider = Testimonial::create($data);
        $multi_image=
            [
                'reference_id' => $slider->id,
                'reference_type'=>'testimonial',
                'image' => $main_file,
            ];

        $multi = media::create($multi_image);



        return redirect()->back()->with('success', 'Testimonial added succesfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!auth()->user()->hasPermissionTo('testimonial-edit')){
            return abort(401);
        }
        $data['media'] = array();
        $data = array();
        $data['testimonial'] = Testimonial::where('id',$id)->get()->first();
        $data['media'] = media::where('reference_id',$id)->where('reference_type','testimonial')->get()->first();
        return view('management/testimonial/edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        if(!auth()->user()->hasPermissionTo('testimonial-edit')){
            return abort(401);
        }

        $pages = Testimonial::where('id',$id)->get()->first();
        $multi = media::where('reference_id', $id)->where('reference_type','testimonial')->get()->first();
        if($request->file('image')){

            $ext = $request->file('image')->getClientOriginalExtension();
            $main_file = 'testimonial'.time() . rand(1000, 14000000000) . '.' . $ext;
            $request->image->move(public_path('images/media'), $main_file);
        }
        else
        {
            $main_file = $multi->image;
        }

        $pages->update([
            'name' =>  $request->name,
            'designation' =>  $request->designation,
            'comment' =>  $request->comment,
            'orderby' => $request->orderby,
            'status' => $request->status,
        ]);




if($multi != null ){
    $multi->update([
        'image' => $main_file,
    ]);
}else{
    $multi_image=
        [
            'reference_id' => $id,
            'reference_type'=>'testimonial',
            'image' => $main_file,
        ];

    media::create($multi_image);

}


        return redirect()->back()->with('success','Pages Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!auth()->user()->hasPermissionTo('testimonial-delete')){
            return abort(401);
        }
        $slider = Testimonial::where('id',$id)->delete();
        return  redirect()->back()->with('success', 'Testimonial deleted successfully');

    }
    public function theme_setting_fields(Request $request)
    {
        $data = [
            'title'=>$request->title,
            'type'=>$request->type,
            'option_key'=>$request->option_key,
            'input_type'=>$request->input_type,
            'input_type_key'=>json_encode($request->input_type_key),

        ];
        DB::table('settings')->insert($data);
        return redirect()->back()->with('success','Settings Fields Created Successfully');

    }
}
