<title>
    {{--    @yield('title') --}}
    {!! isset($seo) ? $seo->meta_title : 'On the Vouch | Best Deals and Coupons' !!}
</title>
<link rel="apple-touch-icon" sizes="180x180" href="https://onthevouch.com/public/images//apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="https://onthevouch.com/public/images//favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="https://onthevouch.com/public/images//favicon-16x16.png">
<link rel="manifest" href="https://onthevouch.com/public/images//site.webmanifest">
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="title" content="{{ isset($seo) ? $seo->meta_title : 'On the Vouch | Best Deals and Coupons' }}">
<meta name="description"
    content="{{ isset($seo)
        ? htmlspecialchars($seo->meta_description)
        : '  We are going to save you money with the best deals & coupons.
    Our mission is to get the best deals under one platform where you can save as much as you can ' }}">

<meta name="keywords"
    content="{{ isset($seo) ? $seo->meta_keywords : 'Best Deals , Best Coupons, SALE, Amazon Deals , 50% Off, Hyper Discount, Flash Sale, Festive Sale, Festive Deals' }}">


<script async src="https://www.googletagmanager.com/gtag/js?id=G-43L8N6LSVD"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-43L8N6LSVD');
</script>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">

{{-- @include('frontend/style') --}}
{{-- @include('frontend/again') --}}
