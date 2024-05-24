@extends('home')

@section('title', 'Gallery')

@section('content')

    <section class="my-5">
        <div class="container">
            <div class="row">

            @foreach($gallery as $data)
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 margin-bottom margin-top">
                    <img src="{{asset('assets/media/images')}}/{{$data->image}}" alt="Image" class="image-styles">
                </div>
            @endforeach
                <!-- <div class="col-lg-4 col-md-6 col-sm-6 col-12 margin-bottom">
                    <div class="card">
                        <img src="{{asset('frontend/images/ca3.jpg')}}" alt="Image"  class="image-styles">
                    </div>                   
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 margin-bottom">
                    <div class="card">
                        <img src="{{'frontend/images/ca4.jpg'}}" alt="Image"  class="image-styles">
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-12 margin-bottom margin-top">
                    <div class="card">
                        <img src="{{asset('frontend/images/cake.jpg')}}" alt="Image" class="image-styles">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 margin-bottom margin-top">
                    <div class="card">
                        <img src="{{asset('frontend/images/ca5.jpg')}}" alt="Image"  class="image-styles">
                    </div>                   
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 margin-bottom margin-top">
                    <div class="card">
                        <img src="{{'frontend/images/ca2.jpg'}}" alt="Image"  class="image-styles">
                    </div>
                </div> -->
                <div class="col-md-12 mt-4 d-flex justify-content-center">
                    {!!  $gallery->links() !!}
                </div>
            </div>
        </div>
    </section>
    
@endsection

