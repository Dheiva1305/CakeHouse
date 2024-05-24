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
                            <th>Email</th>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($newsletter as $key => $data)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$data->email}}</td>
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