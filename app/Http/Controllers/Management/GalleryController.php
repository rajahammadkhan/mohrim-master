<?php

namespace App\Http\Controllers\Management;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\media;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::get();
        return view('management.gallery.index',compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $galleries = Gallery::get();
        return view('management.gallery.create',compact('galleries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('image')) {
            $mainext = $request->file('image')->getClientOriginalExtension();
            $main_file = 'gallery'.time() . rand(1000, 14000000000) . '.' . $mainext;
            $request->image->move(public_path('images/media'), $main_file);
        } else {
            $main_file = null;
        }

        $data = [
            'image'=> $main_file,
            'caption'=>$request->caption,
        ];

        $gallery = Gallery::create($data);

        $multi_image=
            [
                'reference_id' => $gallery->id,
                'reference_type'=>'post',
                'image' => $main_file,
            ];

        $multi = media::create($multi_image);
        return redirect()->route('gallery.show', $gallery->id)->with('success','Gallery Created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $language = Gallery::where('id',$id)->get()->first();
//        $media = media::where('reference_id',$id)->where('reference_type','gallery')->get()->first();
        return view('management/gallery/edit',compact('language'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data = Gallery::where('id',$id)->get()->first();
        $multi = media::where('reference_id',$id)->where('reference_type','gallery')->get()->first();

        if($request->file('image')){

            $ext = $request->file('image')->getClientOriginalExtension();
            $main_file = 'gallery'.time() . rand(1000, 14000000000) . '.' . $ext;
            $request->image->move(public_path('images/media'), $main_file);
        }
        else
        {
            $main_file = $multi->image;
        }

        $data->update([
            'image'=> $main_file,
            'caption'=>$request->caption,
        ]);

        if($multi != null ){
            $multi->update([
                'image' => $main_file,
            ]);
        }else {
            $multi_image =
                [
                    'reference_id' => $id,
                    'reference_type'=>'gallery',
                    'image' => $main_file,
                ];

            media::create($multi_image);
        }
        return redirect()->back()->with('success','Gallery Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Gallery::where('id',$id)->get()->first()->delete();
        return redirect()->back()->with('success','Data has been deleted Successfully');
    }
}
