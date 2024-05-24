@extends('partials.sidebar')

@section('content')

    <div class="col-lg-12">
        @if ($status = session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>{{$status}}</strong>
            </div>
        @endif
        <div class="row">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3>Gallery List</h3>
                    <div class="mx-auto">
                        <a href="{{route('admin.gallery.create')}}"><button class="btn btn-primary btn-sm mx-auto">Add Gallery</button></a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table " id="myTable">
                        <thead>
                            <th>#</th>
                            <th>Image</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($gallery as $key => $data)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>
                                        @if($data->image)
                                            <img src="{{ asset('assets/media/images')}}/{{ $data->image }}" alt="Image" width="80px">
                                        @endif
                                    </td>
                                    <td>
                                        <a class="mx-2" href="{{route('admin.gallery.edit',$data->id)}}"><i class="fas fa-edit"></i></a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#myModalDelete{{$data->id}}">
                                            <i class="fas fa-trash text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                <div class="modal" id="myModalDelete{{$data->id}}" data-bs-backdrop="static">
                                    <div class="modal-dialog modal-md modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Confirm Deletion</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('admin.gallery.delete', $data->id) }}" method="POST">
                                                    @csrf

                                                    <input type="hidden" value="{{$data->id}}" name="id">
                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
        var table = $('#myTable').DataTable({
            buttons: [
                'csv'
            ]
        });
    });
    </script>


@endsection