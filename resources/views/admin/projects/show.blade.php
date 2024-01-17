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
                    <div class="mb-3">
                        <h4>type</h4>
                        <a class="badge text-bg-primary"
                            href="{{ route('admin.types.show', $project->type->slug) }}">{{ $project->type->name }}</a>
                    </div>
                @endif

                {{-- technologies --}}

                @if ($project->technologies)
                    <div class="mb-3">
                        <h4>technologies</h4>
                        @foreach ($project->technologies as $technology)
                            <a class="badge rounded-pill text-bg-success"
                                href="{{ route('admin.technologies.show', $technology->slug) }}">{{ $technology->name }}</a>
                        @endforeach

                    </div>
                @endif

                <br>
                <br>
                <div class="d-flex flex-row">
                    <button class="btn btn-primary d-inline-block">
                        <a class="text-white text-decoration-none"
                            href="{{ route('admin.projects.edit', $project->slug) }}">Edit</a>
                    </button>
                    <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="project" class="d-inline">
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




    {{--

@extends('layouts.app')
@section('content')
    <section class="container my-3" id="item-project">
        <div class="d-flex justify-content-between align-items-center">
            <h1>{{ $project->title }}</h1>
            <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-success px-3">Edit</a>
        </div>
        <div>
            <p>{!! $project->body !!}</p>
            @if ($project->type_id)
                <div class="mb-3">
                    <h4>type</h4>
                    <a class="badge text-bg-primary"
                        href="{{ route('admin.types.show', $project->type->slug) }}">{{ $project->type->name }}</a>
                </div>
            @endif
            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
            @if ($project->technologies)
                <div class="mb-3">
                    <h4>technologies</h4>
                    @foreach ($project->technologies as $technology)
                        <a class="badge rounded-pill text-bg-success"
                            href="{{ route('admin.technologies.show', $technology->slug) }}">{{ $technology->name }}</a>
                    @endforeach

                </div>
            @endif
        </div>
    </section>

@endsection --}}
