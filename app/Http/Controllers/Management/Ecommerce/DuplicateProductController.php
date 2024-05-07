<?php

namespace App\Http\Controllers\Management\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\country;
use App\Models\media;
use App\Models\store;
use App\Models\Product;
use App\Models\productpivot;
use App\Models\Variation;
use App\Models\ProductVariant;
use App\Models\ProductInCategory;
use App\Models\Brand;
use App\Models\ProductIsBrand;
use App\Models\SizeChart;
use App\Models\seo;
use App\Models\Currency;
use DB;
use Illuminate\Http\Request;
class DuplicateProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $name = 'yy';

//        $users = Product::with('media')
//        ->whereRelation('media',  'reference_type','yas')->get();
//        $authors = Product::whereHas('seo', function (Builder $query) {
//            $query->where('reference_type', 'product');
//        })->get();

//        $users = Product::get();
//
//
//        dd($users);

//        $course = DB::table('products')
//            ->leftjoin('media', 'products.id', '=', 'media.reference_id' 'media.reference_type', '=' , 'product')
//            ->select('products.*','media.id','media.image','media.reference_type')
//            ->get();
//
//        dd($course);
//


//  THIS IS WORKING QUERY
        $data['product'] = DB::table('products')
            ->leftJoin('media', function ($join) {
                $join->on('media.reference_id', '=', 'products.id')
                    ->where('reference_type', 'product')->groupby('reference_id');
//                     $join->on('media.reference_type' ,'=' ,'products.xyz');

            })
//                    ->leftJoin('seos', function($jo)
//                    {
//                        $jo->on('seos.reference_id', '=', 'products.id')
//                            ->where('seos.reference_type', 'product');
//
//                    })
            ->select('products.id', 'media.*')
            ->get(); // or first()


//        ＄users = DB::table('users')
//            ->join('contacts', 'users.id', '=', 'contacts.user_id')
//            ->join('orders', 'users.id', '=', 'orders.user_id')
//            ->select('users.*', 'contacts.phone', 'orders.price')
//            ->get();
//        $data['product'] = DB::table('products')
//            ->R('media', 'products.id', '=', 'media.reference_id')
//            ->where('media.reference_type', 'product')
//            ->where('products.status' , 1)
//            ->select('products.*','media.image')
//            ->get();
////
//        $data['product'] =DB::table('products')
//             ->leftJoin('media', function($join)
//                 {
//                     $join->on('products.id', '=', 'media.reference_id');
//                     $join->on('media.reference_type' , "'product'");
//
////                 })
//            ->select('products.*', 'media.id', 'media.image')
//            ->get(); // or first()
//
////
//
////
//        dd($data['product']);
//        $course = DB::table('products')->get();
//        dd($leagues);
//        $bl = $_GET['type'];
//        $type = base64_decode($bl);
//        $category = coupon::where(['coupon_type' => $type])->get();

//        $data['prod'] = Product::where('is_variant','==',1)->get()->all();
//        dd($data['prod']);
        $data['media'] = media::where('reference_type', 'product')->get()->groupBy('reference_id');
        $data['f'] = Product::where('status', 1)->get();


        foreach ($data['f'] as $row) {
            if ($row->is_variant == 1) {
                $currency_id = ProductVariant::where('product_id', $row->id)->get()->first();
            } else {
                $currency_id = productpivot::where('product_id', $row->id)->get()->first();
            }
            //print_r($currency_id->currency_id);
            $current_currency = ($currency_id) ? $currency_id->currency_id : '';
            $data['currency'][] = [
                'id' => $row->id,
                'title' => $row->title,
                'status' => $row->status,
                'currency_id' => $current_currency,
            ];
        }

        return view('ecommerce.duplicateProducts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //dd(Variation::get('id'));
        $data['variation'] = Variation::get();
        $data['brands'] = Brand::where('status', 1)->get();
        $data['categories'] = categories::where(['reference_type' => 'product', 'status' => 1])->get();
        $data['chart'] = SizeChart::where('status', 1)->get();
        $data['countries'] = Currency::where('status', 1)->get();
//      foreach($data['variation'] as $key => $node)
//    {
//         dd(json_decode($node->variations));
//
//    }
        return view('ecommerce.duplicateProducts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if ($request->file('chart_img')) {
            $mainext = $request->file('chart_img')->getClientOriginalExtension();
            $charimg = time() . rand(1000, 14000000000) . '.' . $mainext;
            $request->chart_img->move(public_path('images/media'), $charimg);
        } else {
            $main_file = null;
        }
        //       if ($request->char_title != null)
        //       {
        //           $charData = [
        //               'name' => $request->char_title,
        //               'image' => $charimg,
        //               'status' => $request->chart_status,
        //           ];
        //           $chart = SizeChart::create($charData);
        //       }


        //        comment out for checing purpose
        if ($request->file('var_image')) {
            foreach ($request->file('var_image') as $image) {
                $mainext = $image->getClientOriginalExtension();
                $main_file = time() . rand(1000, 14000000000) . '.' . $mainext;
                $image->move(public_path('/images/media'), $main_file);

                $multi_image[] = $main_file;
            }
        } else {
            $multi_image = null;
        }
        if ($multi_image != null) {
            $vars_img = $multi_image;
        }

        //        $compare_price = $request->is_variant == null ? $request->compare_price :  $request->compare_price_var[0];
        //        $discounted_price = $request->is_variant == null ? $request->discounted_price : $request->discounted_price_var[0];
        $quantity = $request->is_variant == null ? $request->stock : null;

        $data = [
            'title' => $request->title,
            'product_tax' => $request->product_tax,
            'status' => $request->status,
            'long_description' => $request->long_description,
            'is_variant' => $request->is_variant,
            'product_tag' => $request->product_tag,
            'continue_selling' => $request->continue_selling,
            'chart_id' => $request->chart_id,
            //                'compare_price' =>$compare_price,
            //                'discounted_price' => $discounted_price,
            'country_id' => $request->country_id,

        ];
        $products = Product::create($data);


        if ($request->is_variant == null) {
            $defaultrate = Currency::where('bydefault', 1)->get()->first();
            if ($request->countries != null) {
                foreach ($request->countries as $country) {
                    $currency = Currency::where('id', $country)->get()->first();

                    if ($defaultrate->id != $country) {
                        $cp = (float)$request->compare_price * (float)$currency->currency_rate;
                        $dp = (float)$request->discounted_price * (float)$currency->currency_rate;
                    } else {
                        $cp = (float)$request->compare_price;
                        $dp = (float)$request->discounted_price;
                    }
                    $data = [
                        'product_id' => $products->id,
                        'stock' => $quantity,
                        'currency_id' => $currency->id,
                        'compare_price' => $cp,
                        'discounted_price' => $dp,
                    ];
                    $category = productpivot::create($data);
                }
            }
        }


        if ($request->is_variant != null) {
            $vari = [];
            /*foreach (decrypt($request->variation) as $key => $val) {
                $vari[$key] = $val->attribute_name;

            }*/
            //print_r($vari);die();
            if ($request->variation_option != null) {


                $i = 0;
                $variation_data = ProductController::variation_recursive($request, $products, $request->variation_option);
//                foreach($request->countries as $key => $val) {
                foreach ($request->countries as $country) {
//                        $currency = Currency::where('id',$country)->get()->first();
//                    $value = current((array)$val);
                    //print_r($i <= $x));
                    //$variation_data[$i]["currency_id"] = $request->countries[$i];
                    //dd($variation_data);

                    //                        foreach($variation_data as $variant_data){
////                        dd($variant_data);
////                       $productvar = ProductVariant::create($variant_data);
//                            $data = [
//                                'variant_options' => $variant_data->variant_options,
//                                'compare_price' => $variant_data->compare_price,
//                                'discounted_price' => $variant_data->discounted_price,
//                                'sku' =>$variant_data->sku,
//                                'quantity' =>$variant_data->quantity,
//                                'currency_id' =>$variant_data->currency_id,
//                                'country_id' =>$variant_data->country_id,
//                                'category_id' =>$variant_data->category_id,
//                                'product_id' =>$variant_data->product_id,
//                                'chart_id' =>$variant_data->chart_id,
//                                'brand_id' =>$variant_data->brand_id,
//                                'variant_id' =>$variant_data->variant_id,
//                                'image' =>$main_file,
//                            ];
//                            $productvar = ProductVariant::create($data);


//                   dd($value);
                    foreach ($variation_data as $variant_data) {
                        $productvar = ProductVariant::create($variant_data);
                    }

                    $i++;
                }
            } else {

                return redirect()->back()->with('wrong', 'atleast make one variation.');
            }

        }

        if ($request->file('image')) {
            foreach ($request->file('image') as $image) {
                $mainext = $image->getClientOriginalExtension();
                $main_file = time() . rand(1000, 14000000000) . '.' . $mainext;
                $image->move(public_path('/images/media'), $main_file);
                $multi_image =
                    [
                        'reference_id' => $products->id,
                        'reference_type' => 'product',
                        'image' => $main_file,
                    ];
                $multi = media::create($multi_image);
            }
        } else {
        }
        if ($request->categories != null) {
            foreach ($request->categories as $cats) {
                $data = [
                    'product_id' => $products->id,
                    'category_id' => $cats,
                ];
                $category = ProductInCategory::create($data);
            }
        }
        $product_brand = [
            'product_id' => $products->id,
            'brand_id' => $request->brand_id,
        ];
        $brands = ProductIsBrand::create($product_brand);

        $seo = [
            'reference_id' => $products->id,
            'meta_title' => $request->meta_title,
            'reference_type' => 'product',
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ];

        $search = seo::create($seo);
        return redirect('admin/duplicateProducts')->with('success', 'Products created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DuplicateProduct  $duplicateProduct
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $data['countries'] = Currency::where('status', 1)->get();
        $data['product'] = product::where('id', $id)->get()->first();

        if ($data['product']->is_variant == 1) {
            $data['ProductVariantsAgainstCurrency'] = ProductVariant::where('product_id', $id)->where('currency_id', $request->cur_id)->get();
            $data['CurrencyAgainstProduct'] = ProductVariant::where('product_id', $id)->select('currency_id')->pluck('currency_id')->toArray();
        } else {
            $data['ProductPriceAgainstCurrency'] = productpivot::where('product_id', $id)->where('currency_id', $request->cur_id)->get();
            $data['CurrencyAgainstProduct'] = productpivot::where('product_id', $id)->select('currency_id')->pluck('currency_id')->toArray();

        }
        //dd( $data['CurrencyAgainstProduct']);
        $data['count'] = ProductVariant::where('product_id', $id)->get()->count();
        $data['op'] = ProductVariant::where('product_id', $id)->get();
        $ops = [];
        if (!empty ($data['op'])) {
            foreach ($data['op'] as $row) {
                $ops[] = json_decode($row->variant_options);
            }
            $data['options'] = $ops;
        }
        $data['chart'] = SizeChart::where('status', 1)->get();
        $data['variation'] = Variation::get();
        $data['brands'] = Brand::where('status', 1)->get();
        $data['categories'] = categories::where(['reference_type' => 'product', 'status' => 1])->get();
        $data['chartsize'] = SizeChart::where('status', 1)->get();
        $data['media'] = media::where('reference_id', $id)->where('reference_type', 'product')->get();
        $data['cate'] = $data['product']->category;
        $data['brandspiv'] = $data['product']->brands;
        $data['cat'] = [];
        foreach ($data['cate'] as $row) {
            $data['cat'][] = $row->category_id;
        }
        $data['usdu'] = $data['cat'];
        $data['seo'] = seo::where('reference_id', $id)->where('reference_type', 'product')->get()->first();
        $data['productcat'] = categories::where(['reference_type' => 'product', 'status' => 1])->get();

        return view('ecommerce.duplicateProducts.edit', $data);
        return $data['count'];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DuplicateProduct  $duplicateProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.duplicateProducts.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DuplicateProduct  $duplicateProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::where('id', $id)->get()->first();
        $multi = media::where('reference_id', $id)->where('reference_type', 'product')->get()->first();
        $productpivot = productpivot::where('product_id', $id)->get()->first();
        $productvariant = ProductVariant::where('product_id',$id)->get()->first();
        $productincategory = ProductInCategory::where('product_id', $id)->get()->first();
        $productisbrand = ProductIsBrand::where('product_id', $id)->get()->first();
        $seo = seo::where('reference_id', $id)->where('reference_type', 'product')->get()->first();
        $quantity = $request->is_variant == null ? $request->stock : null;
                if($request->file('var_image'))
                {
                    foreach($request->file('var_image') as $image)
                    {
                        $mainext = $image->getClientOriginalExtension();
                        $main_file = time() . rand(1000, 14000000000) . '.' . $mainext;
                        $image->move(public_path('/images/media'), $main_file);

                        $multi_image []= $main_file;
                    }
                }
                else{
                    $multi_image = $multi->var_image;
                }
                if($multi_image != null){
                    $vars_img = $multi_image;
                }
//        dd($product);
        $product->update([
            'title' => $request->title,
            'product_tax' => $request->product_tax,
            'status' => $request->status,
            'long_description' => $request->long_description,
            'is_variant' => $request->is_variant,
            'product_tag' => $request->product_tag,
            'continue_selling' => $request->continue_selling,
            'chart_id' => $request->chart_id,
            'country_id' => $request->country_id,

        ]);

        if ($request->is_variant == null) {
            $defaultrate = Currency::where('bydefault', 1)->get()->first();
            if ($request->countries != null) {
                foreach ($request->countries as $country) {
                    $curr_iid = productpivot::where('product_id', $id)->select('currency_id')->get();
                    $currency = Currency::where('id', $country)->get()->first();
                    if ($defaultrate->id != $country) {
                        $cp = (float)$request->compare_price * (float)$currency->currency_rate;
                        $dp = (float)$request->discounted_price * (float)$currency->currency_rate;
                    } else {
                        $cp = (float)$request->compare_price;
                        $dp = (float)$request->discounted_price;
                    }
//                    $abc='';
//                    foreach ($curr_iid as $val) {
//                        $abc=$val->currency_id;
//                    }
//                    switch ($country) {
//                        case($country == $abc):
//                            $productpivot->update([
//                                'product_id' => $product->id,
//                                'stock' => $quantity,
//                                'currency_id' => $currency->id,
//                                'compare_price' => $cp,
//                                'discounted_price' => $dp,
//                            ]);
//                            break;
//                         default:
//                             dd('mannan');
////                            $productpivot=[
////                                    'product_id' => $product->id,
////                                    'stock' => $quantity,
////                                    'currency_id' => $currency->id,
////                                    'compare_price' => $cp,
////                                    'discounted_price' => $dp,
////                                ];
////                                $productpivot=productpivot::create($productpivot);
//                    }

                    if ($country == 7) {
                        $productpivot->update([
                            'product_id' => $product->id,
                            'stock' => $quantity,
                            'currency_id' => $currency->id,
                            'compare_price' => $cp,
                            'discounted_price' => $dp,
                        ]);
                    }
                    if ($country == 15) {
                        $productpivot->update([
                            'product_id' => $product->id,
                            'stock' => $quantity,
                            'currency_id' => $currency->id,
                            'compare_price' => $cp,
                            'discounted_price' => $dp,
                        ]);
                    }
                    if ($country == 16) {
                        $productpivot->update([
                            'product_id' => $product->id,
                            'stock' => $quantity,
                            'currency_id' => $currency->id,
                            'compare_price' => $cp,
                            'discounted_price' => $dp,
                        ]);
                    }
                }

//                    foreach ($curr_iid as $val) {
//                        print($val->currency_id);

//                        switch ($country) {
//                            case $country == 7:
//                                $productpivot->update([
//                                    'product_id' => $product->id,
//                                    'stock' => $quantity,
//                                    'currency_id' => $currency->id,
//                                    'compare_price' => $cp,
//                                    'discounted_price' => $dp,
//                                ]);
//                            case $country == 15:
//                                $productpivot->update([
//                                    'product_id' => $product->id,
//                                    'stock' => $quantity,
//                                    'currency_id' => $currency->id,
//                                    'compare_price' => $cp,
//                                    'discounted_price' => $dp,
//                                ]);
//                            case $country == 16:
//                                $productpivot->update([
//                                    'product_id' => $product->id,
//                                    'stock' => $quantity,
//                                    'currency_id' => $currency->id,
//                                    'compare_price' => $cp,
//                                    'discounted_price' => $dp,
//                                ]);
//                            Default:
//                                dd('mannan');
//                                $productpivot=[
//                                    'product_id' => $product->id,
//                                    'stock' => $quantity,
//                                    'currency_id' => $currency->id,
//                                    'compare_price' => $cp,
//                                    'discounted_price' => $dp,
//                                ];
//                                $productpivot=productpivot::create($productpivot);
//                        }

//                                if ($val->currency_id == 7) {
//                                    $productpivot->update([
//                                        'product_id' => $product->id,
//                                        'stock' => $quantity,
//                                        'currency_id' => $currency->id,
//                                        'compare_price' => $cp,
//                                        'discounted_price' => $dp,
//                                    ]);
//                                }

//                        if ($val->currency_id== 15) {
//                            $productpivot->update([
//                                'product_id' => $product->id,
//                                'stock' => $quantity,
//                                'currency_id' => $currency->id,
//                                'compare_price' =>$cp ,
//                                'discounted_price' =>$dp,
//                            ]);
//                        }
//                        if ($val->currency_id== 16) {
//                            $productpivot->update([
//                                'product_id' => $product->id,
//                                'stock' => $quantity,
//                                'currency_id' => $currency->id,
//                                'compare_price' =>$cp ,
//                                'discounted_price' =>$dp,
//                            ]);
//                        }
//                    }
//                        elseif ($val->currency_id== 15) {
//                            $productpivot->update([
//                                'product_id' => $product->id,
//                                'stock' => $quantity,
//                                'currency_id' => $currency->id,
//                                'compare_price' =>$cp ,
//                                'discounted_price' =>$dp,
//                            ]);
//                        }
//                        elseif ($val->currency_id== 16) {
//                            $productpivot->update([
//                                'product_id' => $product->id,
//                                'stock' => $quantity,
//                                'currency_id' => $currency->id,
//                                'compare_price' =>$cp ,
//                                'discounted_price' =>$dp,
//                            ]);
//                        }
//                        else
//                        {
//                            $data = [
//                                'product_id' => $product->id,
//                                'stock' => $quantity,
//                                'currency_id' => $currency->id,
//                                'compare_price' => $cp,
//                                'discounted_price' => $dp,
//                            ];
//                            $category = productpivot::create($data);
//                        }
//                    }
//                    if ($curr_iid == $country) {
//                        return 'yy ' . $curr_iid . ":" . $country;
//                    } else {
//                        return 'Nooo ' . $curr_iid . ":" . $country;;
//
//                    }

//                            $productpivot->update([
//                                'product_id' => $product->id,
//                                'stock' => $quantity,
//                                'currency_id' => $currency->id,
//                                'compare_price' =>$cp ,
//                                'discounted_price' =>$dp,
//                            ]);
//                }
//            }
//        }

                        if($request->is_variant != null) {
                            $vari = [];
                            foreach (decrypt($request->variation) as $key => $val) {
                                $vari[$key] = $val->attribute_name;
                            }
                            if ($request->variation_option != null)
                            {
                                foreach ($request->variation_option as $key => $value) {
                                    $str = [];
                                    for ($i = 0; $i < count($vari); $i++) {
                //                        dd($i);
                                        $str[] = $key[$value[$vari[$i]]];
                                    }
                                    $productvariant->update([
                                        'variant_options' => json_encode($str),
                                        'compare_price' => $request->compare_price_var[$key],
                                        'discounted_price' => $request->discounted_price_var[$key],
                                        'sku' => $request->sku[$key],
                                        'quantity' => $request->quantity[$key],
                                        'country_id' => $request->country_var[$key],
                                        '$main_file' => $request->quantity[$key],
                                        'product_id' => $product->id,
                                        'variant_id' => $request->variant_id,
                                        'currency_id' => $request->currency_id,
                                        'image' => $vars_img[$key],
                                    ]);
                                }
                            }
                            else{
                                return redirect()->back()->with('wrong','AtLeast make one variation.');
                            }
                        }
                    }
                }
//            }
//        }

        if ($request->file('image')) {
            foreach ($request->file('image') as $image) {
                $mainext = $image->getClientOriginalExtension();
                $main_file = time() . rand(1000, 14000000000) . '.' . $mainext;
                $image->move(public_path('/images/media'), $main_file);
                $multi_image =
                    [
                        'reference_id' => $product->id,
                        'reference_type' => 'product',
                        'image' => $main_file,
                    ];
                $multi = media::create($multi_image);
            }
        } else {
            $main_file = $multi->image;
        }

        if ($request->categories != null) {
            foreach ($request->categories as $cats) {
                $productincategory->update([
                    'product_id' => $product->id,
                    'category_id' => $cats,
                ]);
            }
        }
        $productisbrand->update([
            'product_id' => $product->id,
            'brand_id' => $request->brand_id,
        ]);

        $seo->update([
            'reference_id' => $product->id,
            'meta_title' => $request->meta_title,
            'reference_type' => 'product',
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);

        return redirect('admin/duplicateProducts')->with('success', 'Product Updated successfully');

        //        request()->validate([
        //            'name' => 'required',
        //            'detail' => 'required',
        //        ]);
        //        $product->update($request->all());
        //        return redirect()->route('products.index')
        //            ->with('success','Products updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DuplicateProduct  $duplicateProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Product::where('id', $id)->delete();
        $categoriesvar = ProductVariant::where('product_id', $id)->delete();
        $categ = ProductInCategory::where('product_id', $id)->delete();
        $categorbrand = ProductIsBrand::where('product_id', $id)->delete();
        $seo = seo::where('reference_id', $id)->delete();
        return redirect()->back()->with('success', 'Product deleted succesfully');
    }

    static function variation_recursive($request, $products, $data)
    {
        $result = [];
        $str1 = [];
        foreach ($data as $keys => $vari) {

            $str = [];
            foreach ($vari as $key => $val) {
                //print_r($key);
                // print_r($val);

                array_push($str, $val);
            }

            $vari_count = (isset($vars_img[$keys])) ? $vars_img[$keys] : null;

            array_push($result, [
                'variant_options' => json_encode($str),
                'compare_price' => $request->compare_price_var[$keys],
                'discounted_price' => $request->discounted_price_var[$keys],
                'sku' => $request->sku[$keys],
                'quantity' => $request->quantity[$keys],
                'currency_id' => (isset($request->countries[$keys]) ? $request->countries[$keys] : null),
                '$main_file' => $request->quantity[$keys],
                'product_id' => $products->id,
                'variant_id' => $request->variant_id,
                //'currency_id' => $request->currency_id,
                'image' => $vari_count,
            ]);


        }

        return $result;

    }

    public function SearchKi(Request $request)
    {
        $product = Product::
        leftJoin('media', 'products.id', '=', 'media.reference_id')
            ->where('reference_type','=','product')
            ->orWhere('title', 'like',"%$request->search%")
            ->select('products.id','products.title','products.status','media.image')
            ->get();
        return response($product);
//        $product = DB::table('products')
//                    ->leftJoin('media', function ($join,$request) {
//                        $join->on('media.reference_id', '=', 'products.id')
//                            ->where('reference_type', 'product')->groupby('reference_id')
//                            ->orWhere('title', 'like',"%$request->search%");
//                     })
//                    ->select('products.id','products.title','products.status','media.*')
//                    ->get();
//                    return response($product);

//        $productt = Product::where('title', 'like', "%$request->search%")
//            ->get();
//        return response($productt);
    }

    public function get_variation($data)
    {

    }

}
