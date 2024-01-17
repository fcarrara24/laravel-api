@extends('layouts.app')
@section('content')
    <section class="container">
        <h1 class=" text-center p-4">{{ $technology->name }}</h1>
        @if ($technology->projects)
            @foreach ($technology->projects as $project)
                <div>{{ $project->title }}</div>
            @endforeach
        @else
            <div>no project found</div>
        @endif
        <div class="d-flex flex-row justify-content-between align-items-center">
            <div class="d-flex flex-column @if ($technology->image) w-50 @else w-100 @endif">


                <br>
                <div class="d-flex flex-row">
                    <button class="btn btn-primary d-inline-block">
                        <a class="text-white text-decoration-none"
                            href="{{ route('admin.technologies.edit', $technology->slug) }}">Edit</a>
                    </button>
                    <form action="{{ route('admin.technologies.destroy', $technology->slug) }}" method="POST"
                        class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button technology="submit" class="btn btn-danger cancel-button delete-button">Delete</button>
                    </form>
                    @include('partials.modal_delete')

                </div>
            </div>

        </div>
    @endsection
