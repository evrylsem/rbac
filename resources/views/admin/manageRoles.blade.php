@extends('mainLayout')

@section('page-title','Manage User Roles')

@section('page-content')
<div class="container">
    <div class="row">
        <div class="col" style="font-size: 2rem; font-weight:bold;">
            <a href="{{ route('usertool') }}" class="m-1"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" style="fill: rgba(129, 0, 0, 1)">
                    <path d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path>
                </svg></a>
            Manage Role for <span style="font-size: 2rem; font-weight:bold; color:#810000; text-decoration: underline;">{{ $user->userInfo->user_firstname.' '.$user->userInfo->user_lastname }}</span>.
            <hr>
        </div>
    </div>
    <form action="{{ route('userroleupdate', $user->id) }}" method="POST">
        <div class="row">
            <div class="col">

                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="firstname" value="{{ $user->userInfo->user_firstname }}" placeholder="First Name">
                            <label for="floatingInput" class="auth-labels">First Name</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="lastname" value="{{ $user->userInfo->user_lastname }}"  placeholder="Last Name">
                            <label for="floatingInput" class="auth-labels">Last Name</label>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="username" value="{{ $user->name }}" required placeholder="Username">
                            <label for="floatingInput" class="auth-labels">Username</label>
                        </div>
                    </div>
                    <div class="col">
                        <!-- <div class="row">
                            <div class="col"> -->
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" name="email" value="{{ $user->email }}" placeholder="Email">
                            <label for="floatingInput" class="auth-labels">Email</label>
                        </div>
                        <!-- </div>
                        </div> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input type="checkbox" class="form-check-input border-dark-subtle" name="enable_password_change" id="enable-password-change" @if(Session::get('pwChangeEnabled')=='disabled' ) @endif onchange="togglePasswordSection()">
                            <!-- {{ Session::get('pwChangeEnabled') }} -->
                            <label for="enable-password-change" class="form-label">Change Password?</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="user_password" id="user-password" placeholder="New Password" disabled>
                            <label for="floatingInput" class="">New Password</label>
                            @error('user_password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="user_password_confirmation" id="confirm-user-password" placeholder="Confirm New Password" disabled>
                            <label for="floatingInput" class="">Confirm New Password</label>
                            @error('user_password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- <div class="form-floating row mb-2">
                    <div class="col">
                        <select class="form-select form-select-lg mb-3" name="roles[]" id="roles">
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div> -->

            </div>
            <div class="col mb-3">
                <table>
                    <tr>
                        <th colspan="4">
                            User Roles
                        </th>
                    </tr>
                    @foreach ($roles as $role)

                    <tr>
                        <td>

                            <input type="checkbox" class="form-check-input border border-dark d-inline-block me-2" id="user-role-{{ $role->id }}" name="user-role[]" value="{{ $role->id }}" @if( $user->hasRole($role->name))
                            checked="true"
                            @endif
                            onchange="setRoles(this, {{ $role->id }})">

                        </td>
                        <td class="lh-1 fs-6">
                            <label for="user-role-{{ $role->id }}">{{ strtoupper($role->name) }}</label>
                        </td>
                    </tr>

                    @endforeach
                </table>
                <table id="permissions">
                    <thead>
                        <tr>
                            <th colspan="3">
                                User Permissions
                            </th>
                        </tr>
                    </thead>
                    <tbody id="permission-body">
                        @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                {{ strtoupper(str_replace('_',' ',$permission->name)) }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <button type="submit" class="btn m-2" style="font-weight:bold; background-color: #810000; color:#ffff; padding: 1rem; border-radius: 1.5rem;">
                Update
            </button>
        </div>
    </form>
</div>
@endsection

<script>
    function togglePasswordSection() {
        var checkbox = document.getElementById('enable-password-change');
        var newPass = document.getElementById('user-password');
        var confirmPass = document.getElementById('confirm-user-password');

        if (checkbox.checked) {
            newPass.disabled = false;
            confirmPass.disabled = false;
        } else {

            newPass.disabled = true;
            confirmPass.disabled = true;
        }
    }
</script>


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