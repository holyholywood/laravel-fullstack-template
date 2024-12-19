@extends('components.base')

@section('content')
<div class="flex items-center justify-between w-full">
    @include('components.organisms.pagination-limit')
    <a href="{{ route('currency_create') }}" class="btn btn-primary w-fit ml-auto">Create</a>
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
                <th class="th th-left">Abbreviation</th>
                <th class="th th-left">International Code</th>
                <th class="th th-left">Created By</th>
                <th class="th th-left">Created On</th>
                <th class="th th-left">Updated On</th>
                <th class="th th-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lists as $data)
            <tr>
                <td class="td">
                    {{ $data->name }}
                </td>
                <td class="td">
                    {{ $data->abbr }}
                </td>
                <td class="td">
                    {{ $data->code }}
                </td>
                <td class="td">
                    {{ $data->createdBy->name }}
                </td>
                <td class="td max-w-sm">
                    {{ $data->created_at->format('H:i, d/m/Y') }}
                </td>
                <td class="td max-w-sm">
                    {{ $data->updated_at->format('H:i, d/m/Y') }}
                </td>
                <td class="td flex items-center gap-4 justify-center">
                    <a href="{{ route('currency_edit', $data->id) }}" class="btn btn-primary">Edit</a>
                    <form method="POST" action="{{ route('currency_destroy') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@include('components.organisms.pagination')
@endsection