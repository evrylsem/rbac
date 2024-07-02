@extends('mainLayout')

@section('title','Manage Role')

@section('page-content')

<div class="container">
    <div class="col bg-black text-light fs-25">
        Manage Roles for {{ $user->name }}
    </div>
    <!-- <div> -->
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
    <!-- </div>   -->
</div>
@endsection