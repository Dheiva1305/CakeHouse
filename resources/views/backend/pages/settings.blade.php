@extends('partials.sidebar')

@section('content')

<form action="{{route('admin.setting_update')}}" method="POST" enctype="multipart/form-data">
@csrf

    @if ($status = session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>{{$status}}</strong>
        </div>
    @endif
    <div class="card mt-5">
        <div class="card-header">
            <h6>Settings</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="from-label">Fav Icon</label> 
                        <input type="hidden" name="types[]" value="fav_icon">  
                        <input type="file" class="form-control mb-2" name="fav_icon">
                        <img src="{{ asset('assets/media/images')}}/{{ !empty($fav_icon) ? $fav_icon->value : '' }}" alt="fav_icon" width="50px">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="from-label">Site Logo</label> 
                        <input type="hidden" name="types[]" value="site_logo">  
                        <input type="file" class="form-control mb-2" name="site_logo">
                        <img src="{{ asset('assets/media/images')}}/{{ !empty($site_logo) ? $site_logo->value : '' }}" alt="site_logo" width="50px">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="from-label">Footer Copy Rights</label> 
                        <input type="hidden" name="types[]" value="copy_rights">  
                        <input type="text" class="form-control" name="copy_rights" value="{{ !empty($copy_rights) ? $copy_rights->value : '' }}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="from-label">Footer Content</label> 
                        <input type="hidden" name="types[]" value="footer_content">  
                        <textarea type="text" class="form-control" name="footer_content" rows="4">{{ !empty($footer) ? $footer->value : '' }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-sm" type="submit" id="submit">Update</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-5">
        <div class="card-header">
            <h6>Social Links</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Youtube Link</label>   
                        <input type="hidden" name="types[]" value="youtube_link">  
                        <input type="text" class="form-control" name="youtube_link" value="{{ !empty($youtube) ? $youtube->value : '' }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Instagram Link</label>   
                        <input type="hidden" name="types[]" value="instagram_link">  
                        <input type="text" class="form-control" name="instagram_link" value="{{ !empty($insta) ? $insta->value : '' }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Facebook Link</label>   
                        <input type="hidden" name="types[]" value="facebook_link">  
                        <input type="text" class="form-control" name="facebook_link" value="{{ !empty($facebook) ? $facebook->value : '' }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Twitter Link</label>  
                        <input type="hidden" name="types[]" value="twitter_link">  
                        <input type="text" class="form-control" name="twitter_link" value="{{ !empty($twitter) ? $twitter->value : '' }}">
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-sm" type="submit" id="submit">Update</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-5">
        <div class="card-header">
            <h6>Contact Info</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="from-label">Phone Number</label> 
                        <input type="hidden" name="types[]" value="contact_number">  
                        <input type="text" class="form-control" name="contact_number" value="{{ !empty($contact_number) ? $contact_number->value : '' }}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="from-label">Email</label> 
                        <input type="hidden" name="types[]" value="contact_mail">  
                        <input type="text" class="form-control" name="contact_mail" value="{{ !empty($contact_mail) ? $contact_mail->value : '' }}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="from-label">Adress</label> 
                        <input type="hidden" name="types[]" value="contact_address">  
                        <textarea type="text" class="form-control" name="contact_address" rows="3">{{ !empty($contact_address) ? $contact_address->value : '' }}</textarea>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="from-label">Open Hours</label> 
                        <input type="hidden" name="types[]" value="open_hours">  
                        <textarea type="text" class="form-control" name="open_hours" rows="3">{{ !empty($open_hours) ? $open_hours->value : '' }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-sm" type="submit" id="submit">Update</button>
                </div>
            </div>
        </div>
    </div>


    <div class="card mt-5">
        <div class="card-header">
            <h6>Home Page </h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="from-label">Home Page Service Title</label> 
                        <input type="hidden" name="types[]" value="home_service_title">  
                        <input type="text" class="form-control" name="home_service_title" rows="3" value="{{ !empty($home_service_title) ? $home_service_title->value : '' }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="from-label">Home Page About Us Title</label> 
                        <input type="hidden" name="types[]" value="home_about_us_title">  
                        <input type="text" class="form-control" name="home_about_us_title" rows="3" value="{{ !empty($home_about_us_title) ? $home_about_us_title->value : '' }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="from-label">Home Page About Us Subtitle</label> 
                        <input type="hidden" name="types[]" value="home_about_us_subtitle">  
                        <input type="text" class="form-control" name="home_about_us_subtitle" rows="3" value="{{ !empty($home_about_us_subtitle) ? $home_about_us_subtitle->value : '' }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="from-label">Home Page About Us</label> 
                        <input type="hidden" name="types[]" value="home_about_us">  
                        <textarea type="text" class="form-control" name="home_about_us" rows="3">{{ !empty($home_about_us) ? $home_about_us->value : '' }}</textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="from-label">About Us Content</label> 
                        <input type="hidden" name="types[]" value="about_us_text">  
                        <textarea type="text" class="form-control" name="about_us_text" rows="3">{{ !empty($about_us_text) ? $about_us_text->value : '' }}</textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="from-label">Mission and Vission Title</label> 
                        <input type="hidden" name="types[]" value="mission_vission_title">  
                        <input type="text" class="form-control" name="mission_vission_title" rows="3" value="{{ !empty($mission_vission_title) ? $mission_vission_title->value : '' }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="from-label">Mission and Vission</label> 
                        <input type="hidden" name="types[]" value="mission_vission">  
                        <textarea type="text" class="form-control" name="mission_vission" rows="3">{{ !empty($mission_vission) ? $mission_vission->value : '' }}</textarea>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="from-label">Home Page Newsletter Title</label> 
                        <input type="hidden" name="types[]" value="home_newsletter_title">  
                        <input type="text" class="form-control" name="home_newsletter_title" rows="3" value="{{ !empty($home_newsletter_title) ? $home_newsletter_title->value : '' }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="from-label">Home Page Newsletter Subtitle</label> 
                        <input type="hidden" name="types[]" value="home_newsletter_subtitle">  
                        <input type="text" class="form-control" name="home_newsletter_subtitle" rows="3" value="{{ !empty($home_newsletter_subtitle) ? $home_newsletter_subtitle->value : '' }}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="from-label">Home Page Newsletter Button</label> 
                        <input type="hidden" name="types[]" value="home_newsletter_button">  
                        <input type="text" class="form-control" name="home_newsletter_button" rows="3" value="{{ !empty($home_newsletter_button) ? $home_newsletter_button->value : '' }}">
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-sm" type="submit" id="submit">Update</button>
                </div>
            </div>
        </div>
    </div>

</form>

@endsection