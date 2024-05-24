@extends('partials.sidebar')

@section('content')

    <div class="col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3>Contact List</h3>
                </div>
                <div class="card-body">
                    <table class="table " id="myTable">
                        <thead >
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($contact as $key => $data)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$data->name }}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->number}}</td>
                                </tr>
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