@extends('home')

@section('title', 'Services')

@section('content')

    <section class="about-us">
        <div class="container">
            <div class="row">
                @foreach($category as $data)
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 margin-bottom margin-top">
                    <div class="card">
                        <!-- <img src="{{asset('frontend/images/ca2.jpg')}}" alt="Image" class="image-style"> -->
                        <img src="{{asset('assets/media/images')}}/{{ $data->image }}" alt="Image" class="image-style">
                        <h4 class="d-flex align-items-center justify-content-center p-3 truncate-service">{{ $data->name }}</h4>
                    </div>
                </div>
                @endforeach
                <!-- <div class="col-lg-4 col-md-4 col-sm-6 col-12 margin-bottom">
                    <div class="card">
                        <img src="{{asset('frontend/images/ca3.jpg')}}" alt="Image"  class="image-style">
                        <h4 class="d-flex align-items-center justify-content-center p-3 truncate-service">Donuts</h4>
                    </div>                   
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 margin-bottom">
                    <div class="card">
                        <img src="{{'frontend/images/ca4.jpg'}}" alt="Image"  class="image-style">
                        <h4 class="d-flex align-items-center justify-content-center p-3 truncate-service">Small Cakes</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 margin-bottom margin-top">
                    <div class="card">
                        <img src="{{'frontend/images/ca6.jpg'}}" alt="Image"  class="image-style">
                        <h4 class="d-flex align-items-center justify-content-center p-3 truncate-service">Macarons</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 margin-bottom margin-top">
                    <div class="card">
                        <img src="{{'frontend/images/ca8.jpg'}}" alt="Image"  class="image-style">
                        <h4 class="d-flex align-items-center justify-content-center p-3 truncate-service"> Bithday Cakes</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 margin-bottom margin-top ">
                    <div class="card">
                        <img src="{{'frontend/images/ca7.jpg'}}" alt="Image"  class="image-style">
                        <h4 class="d-flex align-items-center justify-content-center p-3 truncate-service">Fresh Cakes</h4>
                    </div>
                </div> -->

                <div class="col-md-12 mt-4 d-flex justify-content-center">
                    {!!  $category->links() !!}
                </div>
            </div>
        </div>
    </section>

@endsection