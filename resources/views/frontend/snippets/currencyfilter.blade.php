@if($ThemeSettings('option-country-filter','on'))
    {{--    <div class="dropdown country-dropdown">--}}
    {{--        <button class="border-0 bg-transparent dropdown-toggle text-light px-4" type="button"--}}
    {{--                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">--}}

    {{--            <img src="{{asset('flags/'.strtolower($SelectedCountry()->iso).'.svg')}}" class="" style="    width: 35px;">--}}
    {{--        </button>--}}
    {{--        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1"--}}
    {{--        >--}}
    {{--            @foreach($Countries() as $country)--}}
    {{--                <?php ?>--}}
    {{--                <li>--}}
    {{--                    <a class="dropdown-item" href="{{url('countrysort',$country->id)}}">--}}
    {{--                        <img src="{{asset('flags/'.strtolower($country->iso).'.svg')}}"--}}
    {{--                             class="w-40">--}}
    {{--                    </a>--}}
    {{--                </li>--}}
    {{--            @endforeach--}}

    {{--        </ul>--}}
    {{--    </div>--}}
{{--    @dd($Currency())--}}

{{--    @dd(session::get('currency'))--}}

{{--    <div class="custom-dropdown-area mx-2 text-uppercase">--}}
{{--        <div class="dropdown-toggle country-list"> <img--}}
{{--                    src="{{asset('flags/'.strtolower($SelectedCurrency()->countries->iso).'.svg')}}" class=""--}}
{{--                    style="    width: 35px;" alt="{{$SelectedCurrency()->iso}} Selected">--}}
{{--        </div>--}}
{{--        <ul class="custom-Dropdown p-2">--}}
{{--            @foreach($Currency() as $currency)--}}
{{--                <?php ?>--}}
{{--                <li>--}}
{{--                    <a class="dropdown-item" href="{{url('currencysort',$currency->id)}}">--}}
{{--                        <img src="{{asset('flags/'.strtolower($currency->countries->iso).'.svg')}}"--}}
{{--                             class="" style="width: 35px;" alt="{{$currency->iso}}">--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}

    <div class="dropdown bootcustom">
        <button class="btn btn-transparent dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img
                    src="{{asset('flags/'.strtolower($SelectedCurrency()->countries->iso).'.svg')}}" class=""
                    style="    width: 35px;" alt="{{$SelectedCurrency()->iso}} Selected">
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @foreach($Currency() as $currency)
                <?php ?>

                    <a class="dropdown-item" href="{{url('currencysort',$currency->id)}}">
                        <img src="{{asset('flags/'.strtolower($currency->countries->iso).'.svg')}}"
                             class="" style="width: 35px;" alt="{{$currency->iso}}">
                    </a>

            @endforeach
        </div>
    </div>
@endif



<style>
    .bootcustom .dropdown-menu{
        min-width:auto !important;
    }
    .bootcustom .dropdown-item{
        padding: 0.25rem 1rem !important;
    }

</style>
