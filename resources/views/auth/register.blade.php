@extends('mainLayout')

@section('page-title','Account Registration')

@section('auth-content')
<div class="container">
    <div class="row">
        <div class="" style="font-size: 2rem; font-weight:bold;">
            <a href="{{ route('home') }}" class="m-1"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" style="fill: rgba(129, 0, 0, 1);transform: ;msFilter:;"><path d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path></svg></a>
            Registration.
            <hr>
        </div>
        <div class="col">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="firstname" value="{{ old('firstname') }}" required placeholder="First Name">
                            <label for="floatingInput" class="auth-labels">First Name</label>
                            @error('firstname')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="lastname" value="{{ old('lastname') }}" required placeholder="Last Name">
                            <label for="floatingInput" class="auth-labels">Last Name</label>
                            @error('lastname')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="name" value="{{ old('name') }}" required placeholder="Username">
                            <label for="floatingInput" class="auth-labels">Username</label>
                            @error('lastname')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" name="email" placeholder="Email">
                                    <label for="floatingInput" class="auth-labels">Email</label>
                                    @error('email')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <input type="checkbox" name="generate_email" id="generate_email" class="form-check-input border border-dark">
                            <label for="generate_email" class="form-check-label">Generate Email Address</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" name="password" required placeholder="Password">
                            <label for="floatingPassword" class="auth-labels">Password</label>
                            @error('password')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" name="password_confirmation" required placeholder="Confirm Password">
                            <label for="floatingPassword">Confirm Password</label>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <button type="reset" class="m-2 " style="font-weight:bold; width: 8rem; background-color: transparent; padding: 1rem; border: 2px solid #810000; border-radius: 1.5rem;">
                        Clear
                    </button>
                    <button type="submit" class="btn m-2" style="font-weight:bold; width: 8rem; background-color: #810000; color:#ffff; padding: 1rem; border-radius: 1.5rem;">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- <div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 text-left lh-sm" style="font-size: 1.6rem; background-color: black; color: white;">Register New User</div>
        <div class="col-sm-3"></div>
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf
    <div class="row">
        <div class="col">
        </div>
        {{-- <div style="border: 1px solid grey;"> --}}
        <div class="col" style="border-top:1px solid grey; border-left:1px solid grey; border-bottom:1px solid grey; ">
            <div>
                <label class="auth-labels">First Name</label>
                <input type="text" name="firstname" value="{{ old('firstname') }}" required class="auth-textbox form-control form-control-sm border border-dark">
                @error('firstname')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="auth-labels">Last Name</label>
                <input type="text" name="lastname" value="{{ old('lastname') }}" required class="auth-textbox form-control form-control-sm border border-dark">
                @error('lastname')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="auth-labels">Username</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="auth-textbox form-control form-control-sm border border-dark">
                @error('name')
                    <span>{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col" style="border-top:1px solid grey; border-right:1px solid grey; border-bottom:1px solid grey; ">
            <div>
                <label class="auth-labels">Email</label>
                <input type="email" name="email" class="auth-textbox form-control form-control-sm border border-dark">
                <input type="checkbox" name="generate_email" id="generate_email" class="form-check-input border border-dark">
                <label for="generate_email" class="form-check-label">Generate Email Address</label>
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="auth-labels">Password</label>
                <input type="password" name="password" required class="auth-textbox form-control form-control-sm border border-dark">
                @error('password')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="auth-labels">Confirm Password</label>
                <input type="password" name="password_confirmation" required class="auth-textbox form-control form-control-sm border border-dark">
            </div>
        </div>
        {{-- </div> --}}
        <div class="col">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 py-2" style="border-left:1px solid grey; border-right:1px solid grey; border-bottom:1px solid grey;">
            <div class="text-center">
                <button type="submit" class="btn btn-md btn-primary">Register</button>
                <button type="reset" class="btn btn-md btn-danger">Clear</button>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
    </form>
    <div class="col-row text-center">
        <a href="{{ route('home') }}" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Return to Landing Page</a>
    </div>
</div> -->
@endsection
