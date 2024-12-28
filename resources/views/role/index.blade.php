@extends('components.base')

@section('content')
<div class="flex items-center justify-between w-full">
    @include('components.organisms.pagination-limit')
    <a href="{{ route('role.create') }}" class="btn btn-primary w-fit ml-auto">Create</a>
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
                <th class="th th-left">Name</th>
                <th class="th th-left">Created On</th>
                <th class="th th-left">Updated On</th>
                <th class="th">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lists->items() as $data)
            <tr>
                <td class="td capitalizes">
                    {{ str($data->name)->lower()->title()->replace('_', " ") }}
                </td>
                <td class="td whitespace-nowrap">
                    {{ $data->created_at->format('H:i, d/m/Y') }}
                </td>
                <td class="td whitespace-nowrap">
                    {{ $data->updated_at->format('H:i, d/m/Y') }}
                </td>
                <td class="td td-center">
                    <a href="{{ route('role.edit', $data->id) }}" class="btn btn-primary-outline w-fit mx-auto">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('components.organisms.pagination')

@endsection