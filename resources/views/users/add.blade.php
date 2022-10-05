@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-white text-uppercase d-flex justify-content-between">
                    <div class="mt-1  text-uppercase font-weight-bold">Add new User</div>
                </div>
            </div>

            <div class="card mt-1">
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="text-muted mb-0">Full Name:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                   name="name" placeholder="Full name" value="{{old('name')}}">

                            @error('name')
                            <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-muted mb-0">Email:</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email Address"
                                   value="{{old('email')}}">

                            @error('email')
                            <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="username" class="text-muted mb-0">Username:</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username"
                                   value="{{old('username')}}">

                            @error('username')
                            <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="password" class="text-muted mb-0">Password:</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                                           placeholder="Password">

                                    @error('password')
                                    <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="password_confirmation" class="text-muted mb-0">Confirm Password:</label>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation"
                                           name="password_confirmation" placeholder="Confirm Password">

                                    @error('password_confirmation')
                                    <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="text-right">
                            <button class="btn btn-primary">Create User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
@endsection
