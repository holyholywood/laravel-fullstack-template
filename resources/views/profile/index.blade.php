@extends('components.base')
@section('content')

@session("errors")
<div class="alert alert-danger">{{ $value }}</div>
@endsession

@session('err_message')
<div class="alert alert-danger">{{ $value }}</div>
@endsession

@session('message')
<div class="alert alert-success">{{ $value }}</div>
@endsession

<form method="POST" action="{{ route('profile.update', $data->id) }}" enctype="multipart/form-data" class="space-y-8">
    <div class="w-fit mx-auto flex flex-col justify-center items-center space-y-2">
        <img src="{{ $data->profile_picture }}" alt="{{ $data->name }} Profile Picture" id="profile-picture-preview"
            class="rounded-full aspect-square object-cover" width="200" height="200">
        <label for="profile_picture" class=" text-sm  text-blue-500 hover:cursor-pointer hover:underline">Change
            Profile
            Picture</label>
        <input type="file" name="profile_picture" id="profile_picture" class="hidden">
    </div>
    <div class="w-full mx-auto space-y-4">
        @csrf
        <div class="row">
            <div class="form-control cols-6 w-full">
                <label for="name" class="input-label font-medium">Name</label>
                <input type="text" class="input w-full " id="name" name="name" value="{{ $data->name }}">
            </div>
            <div class="form-control cols-6 w-full">
                <label for="email" class="input-label font-medium">Email</label>
                <input type="email" class="input w-full " id="email" name="email" value="{{ $data->email }}">
            </div>
            <div class="form-control cols-6 w-full">
                <label for="role" class="input-label font-medium">Role</label>
                <input type="text" class="input w-full " id="role" value="{{ $data->roles[0]->name }}" disabled>
            </div>
        </div>
        <div class="h-[1px] bg-gray-200 w-full rounded-full !my-8"></div>
        <div class="row">
            <div class="form-control cols-6 w-full">
                <label for="password" class="input-label font-medium">New Password</label>
                <input type="password" autocomplete="off" class="input w-full " id="password" name="new_password">
            </div>
            <div class="form-control cols-6 w-full">
                <label for="password" class="input-label font-medium">Confirm Password</label>
                <input type="password" autocomplete="off" class="input w-full " id="password"
                    name="new_password_confirmation">
            </div>
        </div>
        <button class="btn btn-primary mx-auto !mt-10">Save</button>
    </div>
</form>
@endsection