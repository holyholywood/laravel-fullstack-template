@extends('components.base')

@section('content')

@session("errors")
<div class="alert alert-danger">Please fill form correctly!</div>
@endsession
@session("err_message")
<div class="alert alert-danger">{{ $value }}</div>
@endsession

<form method="POST" class="space-y-4 card">
    @csrf
    <div class="row">
        <div class="form-control cols-6">
            <label class="block font-medium" for="name">Name</label>
            <input class="input w-full" type="text" name="name" id="name" value="{{ $data->name ??'' }}" disabled />
        </div>
        <div class="form-control cols-6">
            <label class="block font-medium" for="email">Email</label>
            <input class="input w-full" type="email" name="email" id="email" value="{{ $data->email ??'' }}" disabled />
        </div>
    </div>
    <div class="row">
        <div class="form-control cols-6">
            <label for="select-role" class="block font-medium">Role</label>
            <select name="role_id" id="select-role" class="input-select capitalize">
                <option value="" disabled selected>Select role</option>
            </select>
        </div>
    </div>

    <button class="btn btn-primary ml-auto">Submit</button>
</form>
@endsection