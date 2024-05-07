<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\seo;
use App\Models\Videoshow;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class VideoshowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Videoshow::get();
        return view('management.video.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('management.video.create');
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
            'title' => 'required',
            'video' => 'required|max:10000',
            'thumbnail' => 'required',

        ],
            [
                'title.required' => 'title is required',
                'thumbnail.required' => 'thumbnail is required',
                'video.max' => 'Video is required,should be 10 mb or less',
            ]);

        if ($request->file('video')) {
            $mainext = $request->file('video')->getClientOriginalExtension();
            $main_file = time() . rand(1000, 14000000000) . '.' . $mainext;
            $request->video->move(public_path('media/videos'), $main_file);
        } else {
            $main_file = null;
        }
        if ($request->file('thumbnail')) {
            $mainext = $request->file('thumbnail')->getClientOriginalExtension();
            $thumbnail = time() . rand(1000, 14000000000) . '.' . $mainext;
            $request->thumbnail->move(public_path('media/videos/thumbnail'), $thumbnail);
        } else {
            $main_file = null;
        }
        $data =[

            'user_id' => $request->user_id,
            'title' => $request->title,
            'thumbnail' => $thumbnail,
            'video' => $main_file,
            'description' => $request->description,
            'status' => $request->status,
            ];

        $videos = Videoshow::create($data);

        $seo = [
            'reference_id' => $videos->id,
            'meta_title' => $request->meta_title,
            'reference_type' => 'video',
            'meta_description'=> $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ];

         $search = seo::create($seo);
         return redirect()->back()->with('success','Video has been uploaded succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Videoshow  $videoshow
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $category = Videoshow::where('id',$id)->get()->first();
        $seo = seo::where('reference_id',$id)->where('reference_type','video')->get()->first();
        return view('management/video/edit',compact('category','seo'));


//        return view('management/blog/edit',compact('videos');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Videoshow  $videoshow
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Videoshow  $videoshow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $video = videoshow::where('id',$id)->get()->first();

        if ($request->file('video')) {
            $mainext = $request->file('video')->getClientOriginalExtension();
            $main_file = time() . rand(1000, 14000000000) . '.' . $mainext;
            $request->video->move(public_path('media/videos'), $main_file);
        } else {
            $main_file =  $video->video;
        }
        if ($request->file('thumbnail')) {
            $mainext = $request->file('thumbnail')->getClientOriginalExtension();
            $thumbnail = time() . rand(1000, 14000000000) . '.' . $mainext;
            $request->thumbnail->move(public_path('media/videos/thumbnail'), $thumbnail);
        } else {
            $thumbnail = $video->thumbnail;
        }
        $video->update([
            'title' => $request->title,
            'user_id' => $request->user_id,
            'thumbnail' => $thumbnail,
            'video' => $main_file,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        $seo = seo::where('reference_id',$video->id)->get()->first();

        $seo->update([
            'reference_id' => $video->id,
            'meta_title' => $request->meta_title,
            'reference_type' => 'video',
            'meta_description'=> $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);

        return redirect()->back()->with('success','Video Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Videoshow  $videoshow
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = videoshow::where('id',$id)->delete();
        $seos = seo::where('reference_id',$id)->delete();

        return  redirect()->back()->with('success', 'Video Deleted Succesfully');
    }
}
