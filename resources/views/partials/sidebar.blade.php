<!DOCTYPE html>
<html lang="en">
    @php
        $fav_icon = App\Models\Setting::where('type','fav_icon')->first(); 
    @endphp

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Cakehouse </title>    
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/media/images/'. $fav_icon->value) }}">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <link rel="stylesheet" href="{{asset('assets/css/backend.css') }}">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>

    @php
    $copy_rights = \App\Models\Setting::where('type', 'copy_rights')->first();
    @endphp

    <body>
        <div class="sidebar">
            <div class="logo-details">
                <img src="{{ asset('assets/media/images/'. $fav_icon->value) }}" alt="" width="50px">
            </div>
            <ul class="nav-links">
                <li class="{{ request()->routeIs('admin.home') ? 'active' : '' }}">
                    <a href="{{ route('admin.home') }}"><i class='fas fa-home'></i><span class="link_name">Dashboard</span></a>
                </li>

                <li class="{{ request()->routeIs('admin.home_slider.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.home_slider.index') }}"><i class='fas fa-image'></i><span class="link_name">Home Sliders</span></a>
                </li>

                <li class="{{ request()->routeIs('admin.category.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.category.index') }}"><i class='fas fa-edit'></i><span class="link_name">Category</span></a>
                </li>

                <li class="{{ request()->routeIs('admin.service.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.service.index') }}"><i class='fas fa-edit'></i><span class="link_name">Services</span></a>
                </li>

                <li class="{{ request()->routeIs('admin.gallery.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.gallery.index') }}"><i class='fas fa-images'></i><span class="link_name">Gallery</span></a>
                </li>

                <li class="{{ request()->routeIs('admin.contact_list') ? 'active' : '' }}">
                    <a href="{{ route('admin.contact_list')}}"><i class='fas fa-list'></i><span class="link_name">Contact List</span></a>
                </li>
                <li class="{{ request()->routeIs('admin.newsletter_list') ? 'active' : '' }}">
                    <a href="{{route('admin.newsletter_list')}}"><i class='fas fa-book'></i><span class="link_name">Newsletter List</span></a>
                </li>
                
                <li class="{{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                    <a href="{{route('admin.settings')}}"><i class='fas fa-cog'></i><span class="link_name">Settings</span></a>
                </li>
            </ul>
        </div>
        <section class="home-section">
            <div class="container-fluid admin-header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="home-content">
                            <i class='bx bx-menu close'></i>
                            <span class="text text-white">Cake House</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <div class="home-content">
                        <i class="fas fa-globe-americas"></i><a href="{{url('/')}}" target="_blank"><span class="text text-white">Website</span></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid mt-5">
            
                @section('content')

                @show

            </div>
        </section>
        <section class="">
            <div class="container-fluid mt-5 d-flex justify-content-center" >{{$copy_rights->value}}</div>
        </section>
        
    </body>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", ()=>{
        sidebar.classList.toggle("close");
        });
    </script>
</html>
