<?php

namespace App\Http\Controllers;
use App\Models\media;
use App\Models\Slider;
use App\Models\store;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::get();
        return view('management.slider.index',compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('management.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required',

        ]);

        if ($request->file('image')) {
            $mainext = $request->file('image')->getClientOriginalExtension();
            $main_file = 'slider'.time() . rand(1000, 14000000000) . '.' . $mainext;
            $request->image->move(public_path('images/media'), $main_file);
        } else {
            $main_file = null;
        }

        $image_url = asset('images/media/'.$main_file);

        $data = [
            'user_id' => $request->user_id,
            'url' =>  $request->url,
            'orderby' => $request->orderby,
            'image'=> $main_file,
            'type'=> $request->type,

            'status' => $request->status,
        ];
        $slider = Slider::create($data);

        $multi_image=
            [
                'reference_id' => $slider->id,
                'reference_type'=>'slider',
                'image' => $main_file,
            ];

        $multi = media::create($multi_image);

        return redirect()->back()->with('success', 'slider added succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slider = Slider::where('id',$id)->get()->first();

        return view('management/slider/edit',compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slider = Slider::where('id',$id)->get()->first();

        $multi = media::where('reference_id', $id)->where('reference_type','slider')->get()->first();

        if($request->file('image')){

            $ext = $request->file('image')->getClientOriginalExtension();
            $main_file = 'slider'.time() . rand(1000, 14000000000) . '.' . $ext;
            $request->image->move(public_path('images/media'), $main_file);
        }
        else
        {
            $main_file = $multi->image;
        }

        $image_url = asset('images/media/'.$main_file);


        $slider->update([
//            'user_id' => $request->user_id,
            'url' =>   $request->url,
            'orderby' => $request->orderby,
            'image'=> $main_file,
            'type'=> $request->type,
            'status' => $request->status,
        ]);

        if($multi != null ){
            $multi->update([
                'image' => $main_file,
            ]);
        }else {
            $multi_image =
                [
                    'reference_id' => $id,
                    'reference_type' => 'slider',
                    'image' => $main_file,
                ];

            media::create($multi_image);
        }

        return redirect()->back()->with('success','Slider updates Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::where('id',$id)->delete();
        return  redirect()->back()->with('success', 'Slider deleted successfully');
    }
}
