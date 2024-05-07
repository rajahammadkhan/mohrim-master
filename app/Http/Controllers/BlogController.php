<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\categories;
use App\Models\seo;
use App\Models\media;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Carbon\Carbon;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Reference;

class BlogController extends Controller
{
//    function __construct()
//    {
////        $this->middleware('permission:blog-list|blog-create|blog-edit|blog-delete', ['only' => ['index','show']]);
//        $this->middleware('permission:blog-create', ['only' => ['create','store']]);
//        $this->middleware('permission:blog-edit', ['only' => ['edit','update']]);
//        $this->middleware('permission:blog-delete', ['only' => ['destroy']]);
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = blog::get();
        return view('management.blog.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = categories::where('reference_type','blog')->get();
        return view('management.blog.create',compact('cate'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    public static function getclean($string)
//    {
//        $string = strtolower($string);
//        $string = trim($string, '()');
//        $string =  preg_replace('/[^A-Za-z0-9\-]/', '-', $string);
//        return preg_replace('/-+/', '-', $string);
//    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required',

        ]);



        if ($request->file('image')) {
            $mainext = $request->file('image')->getClientOriginalExtension();
            $main_file = 'post'.time() . rand(1000, 14000000000) . '.' . $mainext;
            $request->image->move(public_path('images/media'), $main_file);
        } else {
            $main_file = null;
        }
        $data = [
            'user_id' => $request->user_id,
            'title' => $request->title,
            'category_id' => $request->category_id,
            'image' => $request->image,
            'long_description'=> $request->long_description,
            'short_description'=> $request->short_description,
            'image'=> $main_file,
            'status' => $request->status,
        ];
        $categories = blog::create($data);


        $multi_image=
            [
                'reference_id' => $categories->id,
                'reference_type'=>'post',
                'image' => $main_file,
            ];

        $multi = media::create($multi_image);



        $seo = [
            'reference_id' => $categories->id,
            'meta_title' => $request->meta_title,
            'reference_type' => 'post',
            'meta_description'=> $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ];

        $search = seo::create($seo);
        return redirect()->route('post.show',$categories->id)->with('success','Blog Created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = blog::where('id',$id)->get()->first();
        $seo = seo::where('reference_id',$id)->where('reference_type','post')->get()->first();
        $media = media::where('reference_id', $id)->where('reference_type','post')->get()->first();

        $all_category = categories::where('reference_type','post')->get();

        return view('management/blog/edit',compact('category','seo','all_category','media'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
//        dd($request);
        $blogs = blog::where('id',$id)->get()->first();

        $multi = media::where('reference_id', $id)->where('reference_type','post')->get()->first();

        if($request->file('image')){

            $ext = $request->file('image')->getClientOriginalExtension();
            $main_file = 'post'.time() . rand(1000, 14000000000) . '.' . $ext;
            $request->image->move(public_path('images/media'), $main_file);
        }
        else
        {
            $main_file = $multi->image;
        }

        $blogs->update([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'image'=> $main_file,
        ]);


        if($multi != null ){
            $multi->update([
                'image' => $main_file,
            ]);
        }else {
            $multi_image =
                [
                    'reference_id' => $id,
                    'reference_type' => 'post',
                    'image' => $main_file,
                ];

            media::create($multi_image);
        }




        $seo = seo::where('reference_id',$blogs->id)->get()->first();

        $seo->update([
            'reference_id' => $blogs->id,
            'meta_title' => $request->meta_title,
            'reference_type' => 'post',
            'meta_description'=> $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);



        return redirect()->back()->with('success','Blog Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = blog::where('id',$id)->delete();
        $seos = seo::where('reference_id',$id)->delete();

        return  redirect()->back()->with('success', 'blog Deleted Succesfully');
    }
}
