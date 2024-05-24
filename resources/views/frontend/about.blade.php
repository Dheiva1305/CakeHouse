@extends('home')

@section('title', 'About')

@section('content')

    @php 
        $about_title = App\Models\Setting::where('type','home_about_us_title')->first(); 
        $about_us_text = App\Models\Setting::where('type','about_us_text')->first(); 
        $mission_vission = App\Models\Setting::where('type','mission_vission')->first(); 
        $mission_vission_title = App\Models\Setting::where('type','mission_vission_title')->first(); 
    @endphp

    <section class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="about-image d-flex align-items-center justify-content-center">
                        <img src="{{asset('frontend/images/welcome-right.jpg')}}" alt="Image" class="image-style">
                    </div>
                </div>
                <div class="col-xl-6 offset-xl-1 col-lg-6 col-md-6 d-flex align-items-center">
                    <div class="about-content">
                        <div class="content">
                            <div class="about-line mb-3">
                                <h4>{{ !empty($about_title) ? $about_title->value : ''}}</h4>
                            </div>
                            <p class="about_para">{{ !empty($about_us_text) ? $about_us_text->value : ''}}</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 margin-top d-flex align-items-center">
                    <div class="about-content">
                        <div class="content ">
                            <div class="about-line mb-3">
                                <h4>{{ !empty($mission_vission_title) ? $mission_vission_title->value : '' }}</h4>
                            </div>
                            <p class="about_para">{{ !empty($mission_vission) ? $mission_vission->value : '' }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-5 col-md-6 d-flex align-items-center justify-content-center">
                    <div class="about-image">
                        <img src="{{asset('frontend/images/ca2.jpg')}}" alt="Image" class="image-style">
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

