@extends('layouts.app')
@section('content')
    <section class="container">
        <h1 class=" text-center p-4">{{ $project->title }}</h1>
        <div class="d-flex flex-row justify-content-between align-items-center">
            <div class="d-flex flex-column @if ($project->image) w-50 @else w-100 @endif">

                <p>{{ $project->body }}</p>
                <a href="{{ $project->github }}">{{ $project->github }}</a>
                {{-- type --}}
                @if ($project->type_id)
                    <a href="{{ route('admin.types.show', $project->type->slug) }}">{{ $project->type->name }}
                    </a>
                @endif

                <br>
                <br>
                <div class="d-flex flex-row">
                    <button class="btn btn-primary d-inline-block">
                        <a class="text-white text-decoration-none"
                            href="{{ route('admin.projects.edit', $project->slug) }}">Edit</a>
                    </button>
                    <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger cancel-button delete-button">Delete</button>
                    </form>
                    @include('partials.modal_delete')

                </div>
            </div>
            @if ($project->image)
                <div class="d-flex flex-row w-50 framed">
                    <img src="{{ asset('storage/' . $project->image) }}" width="100" alt="{{ $project->title }}"
                        @error('image') src="https://picsum.photos/200/300" @enderror style="width: 100%">
                </div>
            @endif
        </div>
    @endsection
