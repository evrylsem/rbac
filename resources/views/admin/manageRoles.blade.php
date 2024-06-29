@extends('mainLayout')

@section('title','Manage Role')

@section('page-content')

<div class="container-fluid">
    <h1>Manage Roles for {{ $user->name }}</h1>

    <form action="{{ route('userroleupdate', $user->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="roles">Roles</label>
            <select name="roles[]" id="roles" class="form-control">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <a href="{{ route('usertool') }}" class="link-dark">Back</a>
                <button type="submit" class="btn btn-primary">Update Roles</button>
            </div>
        </div>
    </form>
</div>
@endsection