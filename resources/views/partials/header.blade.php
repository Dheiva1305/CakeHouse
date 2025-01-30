
@php 
    $site_logo = App\Models\Setting::where('type','site_logo')->first();
@endphp
<div class="nvbr">
    <nav class="navbar navbar-expand-lg navbar-white">
        <div class="container">
            <a class="navbar-brand" href="#">
                <div class="mainlogo">
                    <!-- <img src="{{asset('frontend/images/cake1.png') }}" alt="logo" width="50px"> -->
                    <img src="{{ asset('assets/media/images')}}/{{ $site_logo->value }}" alt="Favicon" width="80px">
                </div> 
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-lg-0">
                    <li class="{{ request()->routeIs('homepage') ? 'active' : '' }} nav-item"><a class="nav-link menu" href="{{ url('/') }}" >Home</a></li>
                    <li class="{{ request()->routeIs('about-us') ? 'active' : '' }} nav-item"><a class="nav-link menu" href="{{ url('/about-us') }}" >About Us</a></li>
                    <li class="{{ request()->routeIs('services') ? 'active' : '' }} nav-item"><a class="nav-link menu" href="{{ url('/services') }}" >Services</a></li>
                    <li class="{{ request()->routeIs('gallery') ? 'active' : '' }} nav-item"><a class="nav-link menu" href="{{ url('/gallery') }}" >Gallery</a></li>
                    <li class="{{ request()->routeIs('contact') ? 'active' : '' }} nav-item"><a class="nav-link menu" href="{{ url('/contact') }}" >Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>






