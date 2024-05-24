@extends('home')

@section('title', 'Home')

@section('content')
    @php 
        $about_title = App\Models\Setting::where('type','home_about_us_title')->first(); 
        $about_subtitle = App\Models\Setting::where('type','home_about_us_subtitle')->first(); 
        $about_text = App\Models\Setting::where('type','about_us_text')->first(); 
        $home_service_title = App\Models\Setting::where('type','home_service_title')->first(); 
        $home_newsletter_title = App\Models\Setting::where('type','home_newsletter_title')->first(); 
        $home_newsletter_subtitle = App\Models\Setting::where('type','home_newsletter_subtitle')->first(); 
        $home_newsletter_button = App\Models\Setting::where('type','home_newsletter_button')->first(); 
    @endphp

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($home_slider as $key => $data)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img class="d-block slider_image w-100" src="{{ asset('assets/media/images')}}/{{ $data->image }}" alt="Slide {{ $key + 1 }}">
                </div>  
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <section class="padding-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-12">
                    <div class="port-img" >
                        <img src="frontend\images\ca9.jpg" alt="image" class="image-style">
                    </div>
                </div>
                <div class="col-xl-6 offset-xl-1 col-lg-6 col-md-6 col-12">
                    <div class="home-content">
                        <h4>{{ !empty($about_title) ? $about_title->value : '' }}</h4>
                        <h3 class="fw-bold content-style">{{ !empty($about_subtitle) ? $about_subtitle->value : '' }}</h3>
                        <p class="truncate-paragraph">{{ !empty($about_text) ? $about_text->value : '' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="margin-home">
        <div class="container">
            <span class="fw-bold text-center "><h2 class="mb-5">{{ !empty($home_service_title) ? $home_service_title->value : '' }}</h2></span>
            <div class="row">
                @foreach ($service as $index => $data)
                    @if ($index == 0)
                        <div class="col-lg-4 col-md-12">
                            <div class="home-img">
                               <a href="{{route('services_detail',$data->slug)}}"><img src="{{ asset('assets/media/images')}}/{{ $data->image }}" alt="image" class="home-image"></a> 
                            </div>
                        </div>
                    @elseif ($index == 1)
                    <div class="col-lg-8 col-md-12">
                        <div class="home-img-1">
                            <a href="{{route('services_detail',$data->slug)}}"><img src="{{ asset('assets/media/images')}}/{{ $data->image }}" alt="img" class="home-image-1"></a>
                        </div>
                        <div class="row mt-4">
                        @elseif ($index == 2)
                            <div class="col-lg-6 col-md-6">
                                <div class="home-img-2">
                                    <a href="{{route('services_detail',$data->slug)}}"><img src="{{ asset('assets/media/images')}}/{{ $data->image }}" alt="img" class="home-image-2"></a>
                                </div>
                            </div>
                        @elseif ($index == 3)
                            <div class="col-lg-6 col-md-6">
                                <div class="home-img-2">
                                    <a href="{{route('services_detail',$data->slug)}}"><img src="{{ asset('assets/media/images')}}/{{$data->image }}" alt="img" class="home-image-3"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <section class="container-fluid newsletter-bg">
        <div class="container">
            <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12 newsletter-margin">
                    <h4 class="d-flex text-align-center">{{ !empty($home_newsletter_title) ? $home_newsletter_title->value : ''  }}</h4>
                    <span class="text-muted fs-10">{{ !empty($home_newsletter_subtitle) ? $home_newsletter_subtitle->value : '' }}</span>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12 newsletter-margin">
                    @if ($status = session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>{{$status}}</strong>
                        </div>
                    @endif
                    <form action="{{route('newsletters')}}" method="Post">
                        @csrf
                        <div class="d-flex">
                            <input type="email" name="email" id="email" class="form-control mr-3 form-style" placeholder="Email Address">
                            <button class="btn btn-newsletter" type="submit">{{!empty($home_newsletter_button) ? $home_newsletter_button->value : ''}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
    

