@extends('mainLayout')

@section('page-title','Manage Users')

@section('page-content')
<div class="container-fluid" style="padding:2rem">
    <div class="row">
        <div class="col" style="font-size: 2rem; font-weight:bold;">
            <a href="{{ route('dash') }}" class="m-1"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" style="fill: rgba(129, 0, 0, 1);transform: ;msFilter:;"><path d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path></svg></a>
            User Management.
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-hover">
                <thead>
                    <tr class="text-center">
                        <th style="background-color: #810000; color:#ffff;">User ID</th>
                        <th style="background-color: #810000; color:#ffff;">Username</th>
                        <th style="background-color: #810000; color:#ffff;">Full Name</th>
                        <th style="background-color: #810000; color:#ffff;">Email</th>
                        <th colspan="2" style="background-color: #810000; color:#ffff;"> </th>
                    </tr>
                </thead>
                <tbody class="table-group-divider ">
                    @foreach ($users as $user)
                        <tr class="text-center">
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->userInfo->user_firstname.' '.$user->userInfo->user_lastname }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-center">
                                <form action="{{route('userroles', $user->id)}}">
                                    <button type="submit" class="btn btn-dangerbs-danger-bg-subtle" title="Manage Selected User">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" style="fill: rgba(5, 146, 18, 1);transform: ;msFilter:;"><path d="M21.438 5.089a1.002 1.002 0 0 0-.959.015c-.684.389-1.355.577-2.053.577-2.035 0-3.952-1.629-5.722-3.39-.375-.373-1.063-.373-1.438 0C9.592 3.959 7.598 5.663 5.51 5.663c-.69 0-1.351-.184-2.018-.561-.298-.166-.658-.171-.96-.012s-.501.461-.528.801c-.011.129-.944 12.872 9.683 16.041a.99.99 0 0 0 .286.042H12c.097 0 .192-.014.285-.041 10.657-3.17 9.695-15.916 9.684-16.044a1 1 0 0 0-.531-.8zm-9.452 14.842c-6.979-2.255-7.934-9.412-8.014-12.477.505.14 1.019.209 1.537.209 2.492 0 4.65-1.567 6.476-3.283 1.893 1.788 3.983 3.301 6.442 3.301.53 0 1.057-.074 1.575-.22-.074 3.065-1.021 10.217-8.016 12.47z"></path></svg>
                                    </button>
                                </form>
                                <!-- <a href="{{route('userroles', $user->id)}}" title="Manage Selected User">
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" style="fill: rgba(5, 146, 18, 1);transform: ;msFilter:;"><path d="M21.438 5.089a1.002 1.002 0 0 0-.959.015c-.684.389-1.355.577-2.053.577-2.035 0-3.952-1.629-5.722-3.39-.375-.373-1.063-.373-1.438 0C9.592 3.959 7.598 5.663 5.51 5.663c-.69 0-1.351-.184-2.018-.561-.298-.166-.658-.171-.96-.012s-.501.461-.528.801c-.011.129-.944 12.872 9.683 16.041a.99.99 0 0 0 .286.042H12c.097 0 .192-.014.285-.041 10.657-3.17 9.695-15.916 9.684-16.044a1 1 0 0 0-.531-.8zm-9.452 14.842c-6.979-2.255-7.934-9.412-8.014-12.477.505.14 1.019.209 1.537.209 2.492 0 4.65-1.567 6.476-3.283 1.893 1.788 3.983 3.301 6.442 3.301.53 0 1.057-.074 1.575-.22-.074 3.065-1.021 10.217-8.016 12.47z"></path></svg>
                                    
                                </a> -->
                            </td>
                            <td class="text-center">
                                <form action="{{ route('userdelete', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-dangerbs-danger-bg-subtle" title="Remove Selected User">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" style="fill: rgba(129, 0, 0, 1);transform: ;msFilter:;"><path d="M15 2H9c-1.103 0-2 .897-2 2v2H3v2h2v12c0 1.103.897 2 2 2h10c1.103 0 2-.897 2-2V8h2V6h-4V4c0-1.103-.897-2-2-2zM9 4h6v2H9V4zm8 16H7V8h10v12z"></path></svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <!-- <tr>
                        <td colspan="7">
                            {{ $users->links() }}
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- <div class="container-fluid">
    <div class="row ps-1">
        <div class="col bg-black text-light fs-5 text-start">
             User Management
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped-columns table-hover table-primary fs-6">
                 <tr class="text-center">
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>Full Name</th>
                    <th>E-mail</th>
                    <th colspan="2">Actions</th>
                 </tr>
                 @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->userInfo->user_firstname.' '.$user->userInfo->user_lastname }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-center">
                            <a href="{{route('userroles', $user->id)}}" title="Manage Selected User">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" style="fill: rgba(49, 203, 63, 1);transform: ;msFilter:;"><path d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path></svg>
                                
                            </a>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('userdelete', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-dangerbs-danger-bg-subtle" title="Remove Selected User">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" style="fill: rgba(206, 7, 12, 1);transform: ;msFilter:;"><path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path></svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                 @endforeach
                 <tr>
                    <td colspan="7">
                        {{ $users->links() }}
                    </td>
                 </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{ route('dash') }}" class="link-dark">Back</a>
        </div>
    </div>
</div>-->
@endsection
