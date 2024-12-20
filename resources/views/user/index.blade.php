@extends('components.base')

@section('content')
<div class="flex items-center justify-between w-full">
    @include('components.organisms.pagination-limit')
    <a href="{{ route('user_create') }}" class="btn btn-primary w-fit ml-auto">Create</a>
</div>
@if (session('success_message'))
<div class="alert alert-success">
    {{ session('success_message') }}
</div>
@endif
<div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th class="th th-left">Fullname</th>
                <th class="th th-left">Email</th>
                <th class="th th-left">Role</th>
                <th class="th th-left">Created On</th>
                <th class="th th-left">Updated On</th>
                <th class="th th-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lists->items() as $data)
            <tr>
                <td class="td">
                    {{ $data->name }}
                </td>
                <td class="td">
                    {{ $data->email }}
                </td>
                <td class="td">
                    {{ str($data->roles[0]->name)->lower()->replace("_", " ")->title() }}
                </td>
                <td class="td whitespace-nowrap">
                    {{ $data->created_at->format('H:i, d/m/Y') }}
                </td>
                <td class="td whitespace-nowrap">
                    {{ $data->updated_at->format('H:i, d/m/Y') }}
                </td>
                <td class="td td-center">
                    @if($data->id !== auth()->id())
                    <a href="{{ route('user_edit', $data->id) }}" class="btn btn-primary w-fit mx-auto">Edit</a>
                    @else
                    <button class="btn btn-primary mx-auto" disabled>Edit</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('components.organisms.pagination')

@endsection