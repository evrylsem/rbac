@extends('mainLayout')

@section('page-title','Manage User Roles')

@section('page-content')
<div class="container">
    <div class="row">
        <div class="col" style="font-size: 2rem; font-weight:bold;">
            <a href="{{ route('usertool') }}" class="m-1"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" style="fill: rgba(129, 0, 0, 1);transform: ;msFilter:;"><path d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path></svg></a>
            Manage Role for <span style="font-size: 2rem; font-weight:bold; color:#810000; text-decoration: underline;">{{ $user->userInfo->user_firstname.' '.$user->userInfo->user_lastname }}</span>.
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{ route('userroleupdate', $user->id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" value="{{ $user->userInfo->user_firstname }}" disabled placeholder="First Name">
                                <label for="floatingInput" class="auth-labels">First Name</label>
                            </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" value="{{ $user->userInfo->user_lastname }}" disabled placeholder="Last Name">
                            <label for="floatingInput" class="auth-labels">Last Name</label>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" disabled value="{{ $user->name }}" required placeholder="Username">
                            <label for="floatingInput" class="auth-labels">Username</label>
                        </div>
                    </div>
                    <div class="col">
                        <!-- <div class="row">
                            <div class="col"> -->
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" disabled value="{{ $user->email }}" placeholder="Email">
                                    <label for="floatingInput" class="auth-labels">Email</label>
                                </div>
                            <!-- </div>
                        </div> -->
                    </div>
                </div>
                <div class="form-floating row mb-2">
                    <div class="col">
                        <select class="form-select form-select-lg mb-3" name="roles[]" id="roles">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button type="submit" class="btn m-2" style="font-weight:bold; background-color: #810000; color:#ffff; padding: 1rem; border-radius: 1.5rem;">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
<!-- <div class="container">
    <div class="col bg-black text-light fs-25">
        Manage Roles for {{ $user->name }}
    </div>
    
        <form action="{{ route('userroleupdate', $user->id) }}" method="POST">
            @csrf
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="roles" class="col-form-label">Roles</label>
                </div>
                <div class="col-auto">
                    <select name="roles[]" id="roles" class="form-control">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <a href="{{ route('usertool') }}" class="link-dark">Back</a>
                    <button type="submit" class="btn btn-primary">Update Roles</button>
                </div>
            </div>
        </form>

</div> -->
