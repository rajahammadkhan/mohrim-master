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
    <div class="custom-dropdown-area mx-2 text-uppercase">
        <div class="dropdown-toggle country-list"> <img
                    src="{{asset('flags/'.strtolower($SelectedCountry()->iso).'.svg')}}" class=""
                    style="    width: 35px;" alt="{{$SelectedCountry()->iso}} Selected">
        </div>
        <ul class="custom-Dropdown p-2">
            @foreach($Countries() as $country)
                <?php ?>
                <li>
                    <a class="dropdown-item" href="{{url('countrysort',$country->id)}}">
                        <img src="{{asset('flags/'.strtolower($country->iso).'.svg')}}"
                             class="" style="width: 35px;" alt="{{$country->iso}}">
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endif
