@extends('mainLayout')

@section('page-title','Account Login')

@section('auth-content')
<div class="container d-flex justify-content-center align-items-center vh-100" >
    <div class="row" style="width: 90rem; height: 50rem; border: 1px solid lightgray; border-radius:2rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class="col left" style="background-image:url(../images/side-img.jpg); background-position: center; background-size: cover; background-repeat: no-repeat; position: relative; border-top-left-radius:2rem; border-bottom-left-radius:2rem; ">

        </div>
        <div class="col" style="padding:2.5rem">
            <div class="d-flex justify-content-center mb-3" style="margin-top: 6rem;">
                <img src="..\images\laravel-logo.png" alt="Laravel Logo" style="height: 7rem;">
            </div>
            <div style="font-size: 2rem; font-weight:bold;">
                Login.
            </div>
            <div class="mb-3">
                Don't have an account?
                <a href="{{ route('register') }}" class="link-underline link-underline-opacity-0">Register Here</a>
            </div>
            <div class="">
                <form method="POST" action="{{ route('login') }}" class="form">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="name" value="{{ old('name') }}" required placeholder="Username">
                        <label for="floatingInput" class="auth-labels">Username</label>
                        @error('name')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" name="password" required placeholder="Password">
                        <label for="floatingPassword" class="auth-labels">Password</label>
                        @error('password')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <button type="reset" class="m-2 " style="font-weight:bold; width: 8rem; background-color: transparent; padding: 1rem; border: 2px solid #810000; border-radius: 1.5rem;">Clear</button>
                        <button type="submit" class="btn m-2" style="font-weight:bold; width: 8rem; background-color: #810000; color:#ffff; padding: 1rem; border-radius: 1.5rem;">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- <div class="container vh-100">
    <div class="row lh-base">
        <div class="col-4"></div>
        <div class="col-4" style="font-size: 1.6rem; background-color: black; color: white;">User Login</div>
        <div class="col-4"></div>
    </div>
    <div class="row">
        <div class="col-4">&nbsp;</div>
        <div class="col-4" style="border: 1px solid grey;">
            <form method="POST" action="{{ route('login') }}" class="form">
                @csrf
                <div class="formgroupp">
                    <label class="auth-labels">Username</label>
                    <input type="text" name="name" value="{{ old('name') }}" required class="auth-textbox form-control border border-dark">
                    @error('name')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="formgroup">
                    <label class="auth-labels">Password</label>
                    <input type="password" name="password" required class="auth-textbox form-control border border-dark">
                    @error('password')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="text-center">
                   <button type="submit" class="btn btn-md btn-primary">Login</button>
                   <button type="reset" class="btn btn-md btn-danger">Clear</button>
                </div>
                <div class="text-center">
                    Not a user? Register <a href="{{ route('register') }}">Here</a>.
                </div>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
</div> -->
@endsection
