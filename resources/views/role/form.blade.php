@extends('components.base')

@section('content')

@session("errors")
<div class="alert alert-danger">Please form correctly!</div>
@endsession
@session("err_message")
<div class="alert alert-danger">{{ $value }}</div>
@endsession

<form method="POST" class="">
    @csrf
    <div class="space-y-6">
        <div class="row card">
            <div class="form-control cols-6">
                <label class="block font-medium" for="name">Name</label>
                <input class="input w-full input-required" type="text" name="name" id="name"
                    value="{{ $data->name ??'' }}" />
            </div>
        </div>
        <div class="card space-y-4">
            <h4 class="card-title">Permission</h4>
            <div class="row">
                @foreach ($permissions as $permission)
                <div class="cols-6 flex gap-2 items-center text-sm">
                    <input type="checkbox" name="permissions[]" id="permission-{{ $permission->id }}"
                        value="{{ $permission->name }}" {{ $mode=='create' || $data->permissions->contains($permission)
                    ? 'checked' :'' }}
                    >
                    <label for="permission-{{ $permission->id }}">
                        {{ str($permission->name)->lower()->title()->replace('_', " ")
                        }}
                    </label>
                </div>
                @endforeach
            </div>
        </div>
        <button class="btn btn-primary ml-auto">Submit</button>
    </div>
</form>
@endsection