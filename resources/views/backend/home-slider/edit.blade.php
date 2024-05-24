@extends('partials.sidebar')

@section('content')

    <div class="col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3>Update Home Slids</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.home_slider.update', $home_slider->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control mb-2" name="image" id="image">
                            <img src="{{ asset('assets/media/images')}}/{{ $home_slider->image }}" alt="Image" width="50px">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm">Update</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>


@endsection