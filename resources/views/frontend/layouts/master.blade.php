





{{--@if($ThemeSettings('option-project-type','coupon'))--}}
{{--    @include('frontend/layouts/header')--}}
{{--    --}}{{--@include('management/layouts/sidebar')--}}
{{--    <section class="content">--}}
{{--        @yield('content')--}}
{{--    </section>--}}
{{--    @include('frontend/layouts/footer')--}}
{{--@endif--}}
@if($ThemeSettings('option-project-type','ecommerce'))
    @include('frontend/ecommerce-layouts/header')
    <section class="content">
        @yield('content')
    </section>
    @include('frontend/ecommerce-layouts/footer')
@endif
