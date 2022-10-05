@extends('layouts.app')
@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-white text-uppercase d-flex justify-content-between">
                    <div class="mt-1  text-uppercase font-weight-bold">Users</div>
                    <a href="{{route('users.add')}}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus-circle"></i> Add User
                    </a>
                </div>
            </div>


            <div class="card mt-1">
                <div class="card-body">
                    <div class="table-responsive table-responsive-md">
                        <table id="users" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID#</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Username</th>
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
            ajax: '/api/users',
            pageLength: 6,
            fnCreatedRow (tr, data, index) {
                tr.addEventListener('click', function (e) {
                    window.location.href = `/users/${data['id']}`
                })
            },
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'email'},
                {data: 'username'},
                {data: 'created_at'},
            ]
        })
    </script>
@endsection
