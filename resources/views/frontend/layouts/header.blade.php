<!doctype html>
<html lang="en">
<head>
    @include('frontend/layouts/head')
</head>
<body>
<header class="header mb-md-0 mb-3">
    <div class="desktop">
        <div class="parentDiv">

            <div class="nav">
                <div class="logo">
                    <a href="{{url('/')}}"><img src="{{asset('frontend/img/brandlogo.png')}}" class="w-100 px-5 py-4" alt="{{config('app.name')}}"></a>
                </div>
                <div class="right py-3 w-75 pe-4 d-flex justify-content-center align-items-center">
                    {{$Snippet('search')}}
                    {{$Snippet('countryfilter')}}
                    <div class="right-links">
                        @guest
                            <div class="buttons d-flex">
                                <a href="{{url('login')}}" class="btn log text-dark px-4 py-2">
                                    LOGIN
                                </a>
                                <a href="{{url('register')}}" class="btn bg-signature text-white  px-4 py-2">
                                    SIGNUP
                                </a>
                            </div>
                        @endguest
                        @auth

                            <div class="custom-dropdown-area UserProfile mx-3">
                                <div class="User-avtar d-flex align-items-center dropdown-toggle">
                                    @if(auth()->user()->image == null)
{{--                                    <img src="{{asset('frontend/img/user.png')}}"/>--}}
                                        <div class=""> </div>
                                    @else
                                        <img style="border-radius: 50%; object-fit: cover" src="{{asset('/images/profile/'.auth()->user()->image)}}" alt="{{auth()->user()->name}}"/>


                                    @endif
                                    <p class="user_name px-3 mb-0">
                                        {{ Auth::user()->name }}
                                    </p>
                                </div>
                                <ul class="custom-Dropdown">
                                    <li><a href="{{url('my-profile')}}">My Account</a></li>
                                    @if(auth()->user()->user_type == 'admin')
                                        <li><a href="{{url('admin/dashboard')}}">Admin Dashboard</a></li>

                                    @endif
                                    <li> <form class="m-0" method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="#"  :href="route('logout')"
                                               onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                 {{ __('Log Out') }}
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </div>

                        @endauth

                    </div>
                </div>
            </div>
        </div>
    </div>
{{--     mobile view--}}
    <div class="mobile-nav justify-content-between align-items-center ">
        <nav class="navbar p-0 mob container-fluid ">
<div class="row">
            <div class="col-6">
                <a href="{{url('/')}}" class="brand"><img src="{{asset('frontend/img/mobbrandlogo.png')}}" alt="{{config('app.name')}} Brand"></a>
            </div>

            <div class="col-2 text-end">
                {{$Snippet('countryfilter')}}
            </div>
    <div class="col-1 d-flex align-items-center justify-content-center">
        <span><i class="fa fa-search search-toggle" aria-hidden="true"></i></span>

    </div>
            <div class="col-2 d-flex justify-content-center align-items-center">

                <div class="togle burger" id="burger">
                    <span class="burger-line"></span>
                    <span class="burger-line"></span>
                    <span class="burger-line"></span>
                </div>
            </div>
</div>
            <span class="overlay"></span>
            <nav class="sidebar mob px-0">

                <ul class="list">
                    <li class="px-4 lh">
                        {{$Snippet('search')}}
                    </li>
                    <li>
                        <a href="#" class="comm-btn">Category
                            <span class="fas fa-caret-down third" aria-hidden="true"></span>
                        </a>
                        <ul class="comm-show">
                            @foreach($Categories('coupon') as $category)
                                <li><a class="dropdown-item"
                                       href="{{url('collection',$category->slug)}}">{{$category->title}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class=" linkz  {{ (request()->is('coupons')) ? 'active' : '' }}">
                        <a href="{{url('coupons')}}">Coupons</a></li>
                    <li class=" linkz"  {{ (request()->is('deals')) ? 'active' : '' }}">
                    <a href="{{url('deals')}}">Deals</a></li>
                    <li class=" linkz  {{ (request()->is('video')) ? 'active' : '' }}">
                        <a href="{{url('video')}}">Video</a></li>
                    <li class="linkz  {{ (request()->is('blog')) ? 'active' : '' }}">
                        <a href="{{url('blog')}}">Blog</a></li>
                    <li class="linkz  {{ (request()->is('contact')) ? 'active' : '' }}">
                        <a href="{{url('contact')}}">Contact</a></li>

                    @auth
                        <li>
                            <a href="#" class="user-btn">{{ Auth::user()->name }}
                                <span class="fas fa-caret-down fourth"></span>
                            </a>
                            <ul class="user-show">
                                <li><a href="{{url('my-profile')}}">My Account</a></li>
                                @if(auth()->user()->user_type == 'admin')
                                    <li><a href="{{url('admin/dashboard')}}">Admin Dashboard</a></li>

                                @endif
                                <li>
                                    <form class="m-0" method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="#"  :href="route('logout')"
                                           onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                    @guest
                        <li class="px-3 py-3">
                            <div class="side-nav-buttons d-flex">
                                <a href="{{url('login')}}" class="log rounded-pill mx-1 px-4 text-center">Login</a>
                                <a href="{{url('register')}}" class="sign px-4 mx-1 text-center">Signup</a>
                            </div>
                        </li>
                    @endguest
                </ul>
            </nav>

        </nav>
    </div>
</header>

            <div class="top-links bg-signature container mb-3">
                <div class="row">
                    <div class="col-12 d-flex justify-content-nter ">
                        <div class="custom-dropdown-area mx-4 text-uppercase">
                            <li class="list-unstyled dropdown-toggle py-3" data-bs-toggle="dropdown"><a href="#">CATEGORIES</a></li>
                            <ul class="custom-Dropdown" id="style-1">
                                @foreach($Categories('coupon') as $category)
                                    <li><a class="dropdown-item"
                                           href="{{url('collection',$category->slug)}}">{{$category->title}}</a></li>
                                @endforeach

                            </ul>
                        </div>
                        <a href="{{url('coupons')}}" class="mx-4 text-uppercase py-3
                         list-unstyled li-links py-2
                        {{ (request()->is('coupons')) ? 'active' : '' }}">Coupons</a>
                        <a href="{{url('deals')}}" class="mx-4 text-uppercase py-3
                         list-unstyled li-links py-2
                        {{ (request()->is('deals')) ? 'active' : '' }}">Deals</a>
                        <a href="{{url('video')}}" class="mx-4 text-uppercase py-3
                           list-unstyled li-links py-2
                           {{ (request()->is('video')) ? 'active' : '' }}">Video Show</a>
                        <a href="{{url('blog')}}" class="mx-4 text-uppercase py-3
                        list-unstyled li-links py-2
                          {{ (request()->is('blog')) ? 'active' : '' }}">blog</a>
                        <a href="{{url('contact')}}" class="mx-4 text-uppercase py-3
                        list-unstyled li-links py-2
                          {{ (request()->is('contact')) ? 'active' : '' }}">contact</a>
                    </div>
                </div>
            </div>

<style>
    .top-links ul.custom-Dropdown {
        max-height: 60vh;
        min-height: auto;
        overflow-y: auto;
    }
</style>
