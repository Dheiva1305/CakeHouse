<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>
<body>


@php
    $copy_rights = \App\Models\Setting::where('type', 'copy_rights')->first();
    $facebook = \App\Models\Setting::where('type', 'facebook_link')->first();
    $insta = \App\Models\Setting::where('type', 'instagram_link')->first();
    $youtube = \App\Models\Setting::where('type', 'youtube_link')->first();
    $twitter = \App\Models\Setting::where('type', 'twitter_link')->first();
    $footer_text = \App\Models\Setting::where('type', 'footer_content')->first();
    $contact_number = \App\Models\Setting::where('type', 'contact_number')->first();
    $contact_mail = \App\Models\Setting::where('type', 'contact_mail')->first();
    $site_logo = App\Models\Setting::where('type','site_logo')->first();
@endphp

<div class="container-fluid footers-text">
    <div class="container pt-5">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
                <div class="footer-logo">
                    <img src="{{ asset('assets/media/images')}}/{{ $site_logo->value }}" alt="Favicon" width="80px">
                </div>
                <div class="mt-4">
                    <p class="mb-3 text-truncate-2">
                    {{ $footer_text->value }}
                    </p>
                </div>
            </div>
        
            <div class="col-xl-3 col-lg-6 col-md-6 mb-4 d-md-block d-none">
                <h5 class="mb-4 ">QUICK LINKS</h5>
                <ul class="mt-3 footer-subtext">
                    <li class="mb-3"><a href="{{ url('/') }}" class="footer-atag">Home</a></li>
                    <li class="mb-3"><a href="{{ url('/about-us') }}" class="footer-atag">About Us</a></li>
                    <li class="mb-3"><a href="{{url('/services')}}" class="footer-atag">Services</a></li>
                    <li class="mb-3"><a href="{{ url('/gallery') }}" class="footer-atag">Gallery</a></li>
                    <li class="mb-3"><a href="{{ url('/contact') }}" class="footer-atag">Contact Us</a></li>
                </ul>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 mb-4 d-md-block d-none">
                <h5 class=" mb-4">CONTACT US</h5>
                <div class="d-flex align-items-center">
                    <div class="footer-p">
                    <i class="fas fa-phone footer-phone"></i>
                    </div>
                    <p class="m-0 ">Call Us : </p>
                </div>
                <p class="ml-4 number ">{{ $contact_number->value }}</p>
                <div class="d-flex align-items-center">
                    <div class="footer-p">
                        <i class="fas fa-envelope footer-mail"></i>
                    </div>
                    <p class="m-0 ">Mail Us : </p>
                </div>
                <p class="ml-4 number ">{{ $contact_mail->value }}</p>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 mb-4 d-md-block d-none">
                <h5 class=" mb-4">FOLLOW US</h5>
                <div class="d-flex">
                    <a href="{{ $facebook->value }}" target="_blank"><i class="fab fa-facebook font-size margin-right icon-color"></i></a>
                    <a href="{{ $insta->value }}" target="_blank"><i class="fab fa-instagram font-size margin-right icon-color"></i></a>
                    <a href="{{ $twitter->value }}" target="_blank"><i class="fab fa-twitter font-size margin-right icon-color"></i></a>
                    <a href="{{ $youtube->value }}" target="_blank"><i class="fab fa-youtube font-size margin-right icon-color"></i></a>
                </div>
            </div>
        </div>

        <div class="d-md-none d-block">
            <div class="container p-0">
                <div class="accordion md-accordion p-0" id="accordionEx1" role="tablist"
                    aria-multiselectable="true">
                    <div class="accordion-border">
                        <div class="Accordion-header" role="tab" id="headingTwo1">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1"
                                href="#collapseTwo1" aria-expanded="false" aria-controls="collapseTwo1">
                                <h5 class="mb-0 d-flex justify-content-between fo-text">
                                    QUICK LINKS<i class="fas fa-angle-down rotate-icon"></i>
                                </h5>
                            </a>
                        </div>

                        <div id="collapseTwo1" class="collapse-body collapse" role="tabpanel"
                            aria-labelledby="headingTwo1" data-parent="#accordionEx1" style="">
                            <div class="accordion-body">
                                <ul class="mt-3 footer-subtext">
                                    <li class="mb-3"><a href="{{ url('/home') }}" class="footer-atag ">Home</a></li>
                                    <li class="mb-3"><a href="{{url('about-us')}}" class="footer-atag">About Us</a></li>
                                    <li class="mb-3 "><a href="{{ url('/services') }}" class="footer-atag ">Services</a></li>
                                    <li class="mb-3"><a href="{{url('gallery')}}" class="footer-atag">Gallery</a></li>
                                    <li class="mb-3"><a href="{{url('contact')}}" class="footer-atag">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-border">
                        <div class="Accordion-header" role="tab" id="headingThree31">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1"
                                href="#collapseThree31" aria-expanded="false"
                                aria-controls="collapseThree31">
                                <h5 class="mb-0 d-flex justify-content-between fo-text">
                                    CONTACT US<i class="fas fa-angle-down rotate-icon"></i>
                                </h5>
                            </a>
                        </div>

                        <div id="collapseThree31" class="collapse collapse-body" role="tabpanel"
                            aria-labelledby="headingThree31" data-parent="#accordionEx1">
                            <div class="accordion-body mt-2 ml-3">
                                <div class="d-flex align-items-center">
                                    <div class="footer-p">
                                    <i class="fas fa-phone footer-phone"></i>
                                    </div>
                                    <p class="m-0">Call Us</p>
                                </div>
                                <p class="ml-4 number">{{ $contact_number->value }}</p>
                                <div class="d-flex align-items-center">
                                    <div class="footer-p">
                                    <i class="fas fa-envelope footer-mail"></i>
                                    </div>
                                    <p class="m-0">Mail Us</p>
                                </div>
                                <p class="ml-4 number">{{ $contact_mail->value }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-border">
                        <div class="Accordion-header" role="tab" id="headingThree30">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1"
                                href="#collapseThree30" aria-expanded="false"
                                aria-controls="collapseThree30">
                                <h5 class="mb-0 d-flex justify-content-between fo-text">
                                    FOLLOW US<i class="fas fa-angle-down rotate-icon"></i>
                                </h5>
                            </a>
                        </div>

                        <div id="collapseThree30" class="collapse collapse-body" role="tabpanel"
                            aria-labelledby="headingThree30" data-parent="#accordionEx1">
                            <div class="accordion-body mt-2">
                                <div class="d-flex">
                                    <a href="{{ $facebook->value }}" target="_blank"><i class="fab fa-facebook font-size margin-right icon-color"></i></a>
                                    <a href="{{ $insta->value }}" target="_blank"><i class="fab fa-instagram font-size margin-right icon-color"></i></a>
                                    <a href="{{ $twitter->value }}" target="_blank"><i class="fab fa-twitter font-size margin-right icon-color"></i></a>
                                    <a href="{{ $youtube->value }}" target="_blank"><i class="fab fa-youtube font-size margin-right icon-color"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid p-0">
    <div class="text-center py-3 footers-bg">{{ $copy_rights->value }}</div>
</div>

</body>
</html>


