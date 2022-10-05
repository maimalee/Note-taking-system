@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-white text-uppercase d-flex justify-content-between">
                    <div class="mt-1  text-uppercase font-weight-bold">Update user information</div>
                </div>
            </div>

            <div class="mb-1 mt-3">
                <a href="{{route('users.view', $user['id'])}}" class="btn btn-primary btn-sm">
                    <i class="fa fa-chevron-left"></i> User Profile
                </a>
            </div>
            <div class="card mt-1">
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="text-muted mb-0">Full Name:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                   name="name" placeholder="Full name" value="{{old('name', $user['name'])}}">

                            @error('name')
                            <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-muted mb-0">Email:</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email Address"
                                   value="{{old('email', $user['email'])}}">

                            @error('email')
                            <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="username" class="text-muted mb-0">Username:</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username"
                                   value="{{old('username', $user['username'])}}">

                            @error('username')
                            <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="text-right">
                            <button class="btn btn-primary">Update User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
