<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Keyword;
use Illuminate\Http\Request;

class KeywordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keyword = Keyword::get();
        return view('management.keyword.index',compact('keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('management.keyword.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            "title"=>$request->title,
            "slug"=>$request->slug,
            "status"=>$request->status,
        ];

        $keyword = Keyword::create($data);
        return redirect()->route('keyword.show',$keyword->id)->with('success','keyword has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keyword  $keyword
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $language = Keyword::where('id',$id)->get()->first();
        return view('management/keyword/edit',compact('language'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keyword  $keyword
     * @return \Illuminate\Http\Response
     */
    public function edit(Keyword $keyword)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keyword  $keyword
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data = Keyword::where('id',$id)->get()->first();

        $data->update([
            "title"=>$request->title,
            "slug"=>$request->slug,
            "status"=>$request->status,
        ]);
        return redirect()->back()->with('success','keyword has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keyword  $keyword
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Keyword::where('id',$id)->get()->first()->delete();
        return redirect()->back()->with('success','Data has been deleted Successfully');
    }

    public function SearchIn()
    {
        return redirect()->back();
    }
}
