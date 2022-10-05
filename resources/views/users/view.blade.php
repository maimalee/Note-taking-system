@extends('layouts.app')
@section('content')
    <div class="row ">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-white text-uppercase">User Information</div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <b>Name:</b>{{$user['name']}}
                        </div>
                        <div class="list-group-item">
                            <b>Email:</b> {{$user['email']}}
                        </div>
                        <div class="list-group-item">
                            <b>Username:</b> {{$user['username']}}
                        </div>
                        <div class="list-group-item">
                            <b>Created At:</b> {{$user['created_at']}}
                        </div>
                    </div>

                    <div class="row">
                        <d class="col-md text-right">
                            <a href="{{route('users.edit', $user['id'])}}" class="btn btn-sm btn-primary">
                                <i class="fa fa-edit"></i> Edit
                            </a>

                            <a href="{{route('users.delete' , $user['id'])}}" class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i> Delete
                            </a>

                    </div>


                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header text-uppercase font-weight-bold">User Notes</div>
                <div class="card-body">
                    <div class="table-responsive table-responsive-md">
                        <table id="users" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID#</th>
                                <th>Title</th>
                                <th>Created At</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $('table#users').DataTable({

            serverSide: true,
            processing: true,
            ajax: '/api/users/{{$user['id']}}/notes',
            pageLength: 3,
            fnCreatedRow(tr, data, index) {
                tr.addEventListener('click', function (e) {
                    window.location.href = `/users/${data['id']}`
                })
            },
            columns: [
                {data: 'id'},
                {data: 'title'},
                {data: 'created_at'},
            ]
        });
    </script>
@endsection
