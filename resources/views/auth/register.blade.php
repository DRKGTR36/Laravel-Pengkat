@extends('layouts.frontend.master')

@section('content')
<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                    </div>
                    <form class="user">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" placeholder="Full Name" required name="name" value="{{ old('name') }}" style="border-radius: 5px">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" placeholder="Email Address" required name="email" value="{{ old('email') }}" style="border-radius: 5px">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" placeholder="Password" required name="password" style="border-radius: 5px">

                                    @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user"
                                    id="password-confirm" placeholder="Repeat Password" required name="password_confirmation" style="border-radius: 5px">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block" style="border-radius: 5px">
                            Register Account
                        </button>

                    </form>
                    <hr>

                    <div class="text-center">
                        <a class="small" href="{{route('login')}}">Already have an account? Login!</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>

</div>

@endsection
