@extends('home')

@section('title', 'Contact')

@section('content')

    @php 
        $contact_number = \App\Models\Setting::where('type', 'contact_number')->first();
        $contact_mail = \App\Models\Setting::where('type', 'contact_mail')->first();
        $contact_address = \App\Models\Setting::where('type', 'contact_address')->first();
        $open_hours = \App\Models\Setting::where('type', 'open_hours')->first();
    @endphp

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-12">
                <div class="row no-gutters">
                    <div class="col-lg-6">
                        <div class="contact-bg">
                            <div class="row">
                                <div class="col-md-6 col-lg-12">
                                    <div class="single-contact-item">
                                        <div class="d-flex justify-content-center">
                                            <div class="icon style-01">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <span class="title">Email Address</span>
                                            <p class="details">{{ $contact_mail->value }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="single-contact-item">
                                        <div class="d-flex justify-content-center">
                                            <div class="icon style-01">
                                                <i class="fas fa-phone"></i>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <span class="title">Phone</span>
                                            <p class="details">{{ $contact_number->value }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="single-contact-item">
                                        <div class="d-flex justify-content-center">
                                            <div class="icon style-01">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <span class="title">Open Hours</span>
                                            <p class="details">{{ $open_hours->value }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="single-contact-item">
                                        <div class="d-flex justify-content-center">
                                            <div class="icon style-01">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <span class="title">Address</span>
                                            <p class="details">{{ $contact_address->value }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6"> 
                        <div class="contact-info">
                            <div class="row">
                                <div class="col-lg-12">
                                    @if ($status = session('success'))
                                        <div class="alert alert-success alert-dismissible fade show">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                            <strong>{{$status}}</strong>
                                        </div>
                                    @endif
                                    <div class="section-title">
                                        <h4>Keep In Touch</h4>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('contact_us') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="name">Phone Number</label>
                                    <input type="text" class="form-control" name="number" id="number" value="{{old('number')}}">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="name">Message</label>
                                    <textarea type="text" class="form-control" name="message" rows="4">{{ old('message') }}</textarea>
                                </div>
                                <div class="form-group mt-3">
                                    <button class="btn btn-color btn-sm" type="submit" id="submit">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
