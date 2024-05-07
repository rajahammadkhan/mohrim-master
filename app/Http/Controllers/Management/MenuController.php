<?php

namespace App\Http\Controllers\Management;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Pages;
use App\Models\Brand;
use App\Models\store;
use App\Models\blog;
use App\Models\categories;
use App\Models\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = Menu::get();
        $data['pages'] = Pages::get();
        $data['brand'] = Brand::get();
        $data['store'] = store::get();
        $data['blog'] = blog::get();
        $data['categories'] = categories::get();
        return view('management.menu.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            "menu_name"=>$request->menu_name,
            "slug"=>$request->slug,
            "menu_item"=>$request->menu_item,
            "status"=>$request->status,
        ];

        $menu = Menu::create($data);
        return redirect()->back()->with('success','Menu Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $data['menu'] = Menu::get();
        $data['pages'] = Pages::get();
        $data['brand'] = Brand::get();
        $data['store'] = store::get();
        $data['blog'] = blog::get();
        $data['categories'] = categories::get();
        $data['spec'] = Menu::where('id',$request->menuz)->get()->first();
        return view('management.menu.index',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Menu::where('id',$id)->get()->first()->delete();
        return redirect()->back()->with('success','Brand Delete successfully');
    }
}
