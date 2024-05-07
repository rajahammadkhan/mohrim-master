@extends('frontend.layouts.master')
@section('title')
{{--    {{ $seo != null ? $seo->meta_title : ''}} - {{config('app.name')}}--}}
@endsection
@section('description')
{{--{{ $seo != null ? $seo->meta_description : ''}}--}}
@endsection
@section('keywords')

{{--    {{ $seo != null ? $seo->meta_keywords : ''}}--}}
@endsection
@section('content')

    @include('frontend/sections/coupon-template')


    @include('frontend/sections/coupon-recommendation')

@endsection
