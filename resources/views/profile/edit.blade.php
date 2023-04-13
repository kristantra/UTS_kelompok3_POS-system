@extends('layouts.app')
@section('title', 'Homepage')

@section('content')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight" style="margin-left: 10px;">
    {{ __('Profile') }}
    
</h2>
    <div class="container mt-4">
        <div class="row">
            <div class="col-3">
                @if($user->avatar)
                    <img src="{{ asset ('storage/'. $user->avatar) }}" class="img-fluid">
                @else
                    <img src="https://www.worldfuturecouncil.org/wp-content/uploads/2020/06/blank-profile-picture-973460_1280-1-300x300.png" class="img-fluid">
                @endif
            </div>
            <div class="col">
                <form action="{{ route ('profile.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" disabled name="email" value="{{ $user->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                        @error('name')
                            <div id="nameHelp" class="form-text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" disabled name="password" value="{{ $user->password }}">
                    </div>
                    <div class="mb-3">
                        <label for="avatar" class="form-label">Avatar</label>
                        <input type="file" class="form-control" id="avatar" name="avatar" style="padding-left: 10px; padding-top: 4px;">
                        @error('avatar')
                            <div id="avatarHelp" class="form-text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-warning">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection