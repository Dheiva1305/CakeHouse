@extends('partials.sidebar')

@section('content')

    <div class="col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3>Create Gallery</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.gallery.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="image">Galley Image</label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm">Save</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

@endsection