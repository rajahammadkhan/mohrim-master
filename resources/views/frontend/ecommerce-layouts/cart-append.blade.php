@php $total = 0 @endphp
@if(session('cart'))
    @foreach(session('cart') as $id => $details)
        @php $total += $details['discount_price'] * $details['quantity'];

     $product_variant = DB::table('product_variants')->where('id',$details['varient_id'])->select('variant_options','compare_price','discounted_price')->get()->first();
          foreach (json_decode($product_variant->variant_options) as $key => $value)
                    {
                        $product_values = current((array)$value);
                                              $ffff =    DB::table('variations')->where('id',key((array)$value))->select('attribute_name')->get()->first();

                          $variations[] =
                           [
                               $ffff->attribute_name=>$product_values,
];
                      }

  @endphp





{{--        @dd($details)--}}

        <div class="img-flex">

            <div class="img-inn">
                <img src="{{asset('images/media/'.$details['image'])}}" style="height:80px;width:60px;" alt="image" class="img-fluid">
            </div>
            <div class="tshirt-content">
                <h6>{{$details['name']}} </h6>
                <p>Color: White</p>
                <p>{{$details['quantity']}}</p>
                {{--                            <span>Additonal discounts cannot be applied to low-priced products.</span>--}}
            </div>
        </div>
        <div class="shirt-table">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Size</th>
                        <th scope="col">Color</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Sub Total</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr data-id="{{$id}}">
                        <td>
                           {{ ucfirst(current((array)$variations[2])) }}

                            {{-- {{dd(current((array)$variations[0]));}}
                                {{key((array)$value)}} =  {{current((array)$value)}} <br>
                            @endforeach   --}}
                        </td>
                        <td>
                           {{ ucfirst(current((array)$variations[1])) }}
                        </td>
                        <td>
                            {{ ucfirst(current((array)$variations[0])) }}  
                        </td>
                        <td class="org-cg"><span class="cut-pr">{{$product_variant->compare_price}}</span> {{$product_variant->discounted_price}}</td>
                        <td class="w-25">
                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart w-50 d-inline-block" />
                        </td> 
                        <td class="org-cg"><span class="cut-pr">${{ $details['compare_price'] * $details['quantity'] }}</span> ${{ $details['discount_price'] * $details['quantity'] }}</td>
                        {{--                                    <td><a href="javascriptvoid:(0)" class="cross-sign"><i class="fa fa-times" aria-hidden="true"></i></a></td>--}}
                            <td class="actions" data-th="">
                            <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
        $variations= []
        ?>
    @endforeach



    <div class="sub-total">
        <h6>Sub Total: <span>Total ${{ $total }}</span></h6>
    </div>

    <div class="sub-total">
        <h6>Standard Shipping: <span>${{$shipemt_charges}}</span></h6>
    </div>
    <div class="tot-amount-content">
        <div class="tot-text">
{{--                    <p>Retail Total: $58.80 <span>Retail Savings: $37.29</span></p>--}}
        </div>
        <div class="sub-total">
            <h6>Total: <span class="ch-col">${{$total + $shipemt_charges}}</span></h6>
        </div>
    </div>

@endif


