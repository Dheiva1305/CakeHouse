@extends('partials.sidebar')

@section('content')

    <div class="col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3>Create Service</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.service.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Category</label>
                           <select name="category" id="category" class="form-control">
                            <option value="">select category</option>
                            @foreach($category as $data)
                            <option value="{{$data->slug}}">{{$data->name}}</option>
                            @endforeach
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Service Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="name">Service Image</label>
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