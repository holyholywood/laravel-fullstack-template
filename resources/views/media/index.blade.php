@extends('components.base')

@section('content')
<div class="flex items-center justify-between w-full">
    @include('components.organisms.pagination-limit')
    <a href="{{ route('media_create') }}" class="btn btn-primary w-fit ml-auto">Create</a>
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
                <th class="th th-center w-64">Preview</th>
                <th class="th th-left">Name</th>
                <th class="th th-left">Size</th>
                <th class="th th-left">Extension</th>
                <th class="th th-left">Description</th>
                <th class="th th-left">Upload By</th>
                <th class="th th-left">Created On</th>
                <th class="th th-left">Updated On</th>
                <th class="th th-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lists as $data)
            <tr>
                <td class="td td-center  w-64">
                    <img src="{{ $data->url }}" alt="{{ $data->filename }}"
                        class="aspect-video object-cover overflow-hidden rounded-lg  w-full max-w-sm" />
                </td>
                <td class="td td-center">
                    {{ $data->filename }}
                </td>
                <td class="td td-center whitespace-nowrap">
                    {{ $data->file_size }} <span class="font-medium text-gray-400">{{ $data->file_size_unit }}</span>
                </td>
                <td class="td td-center">
                    {{ $data->file_extension }}
                </td>
                <td class="td td-center">
                    {{ $data->description ?? "-"}}
                </td>
                <td class="td td-center">
                    {{ $data->uploadBy->name }}
                </td>
                <td class="td td-center max-w-sm">
                    {{ $data->created_at->format('H:i, d/m/Y') }}
                </td>
                <td class="td td-center max-w-sm">
                    {{ $data->updated_at->format('H:i, d/m/Y') }}
                </td>
                <td class="td td-center">
                    <div class="flex items-center gap-4 justify-center">
                        <a href="{{ route('media_edit', $data->id) }}" class="btn btn-primary">Edit</a>
                        <form method="POST" action="{{ route('media_destroy') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@include('components.organisms.pagination')
@endsection