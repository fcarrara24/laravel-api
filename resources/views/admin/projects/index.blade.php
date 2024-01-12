@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Projects List</h1>

        @if (!empty(session('message')))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif

        @foreach ($projects as $project)
            <div class="mt-2 d-block position-relative border border-2 p-3 rounded"
                href="{{ route('admin.projects.show', $project->id) }}">
                {{ $project->title }}
                <a href="{{ route('admin.projects.show', $project->id) }}">
                    <i class="fa-solid fa-eye position-absolute top-25 end-0 text-success me-1 fs-5"></i>
                </a>
                <a href="{{ route('admin.projects.edit', $project->id) }}">
                    <i class="fa-solid fa-pen-to-square position-absolute top-25 text-primary me-1 fs-5"
                        style="right: 25px"></i>
                </a>
                <a href="{{ route('admin.projects.destroy', $project->id) }}" class="text-danger">
                    <i class="fa-solid fa-trash position-absolute top-25 text-danger me-1 fs-5" style="right: 50px"></i>
                </a>
            </div>
        @endforeach
        <button class="btn btn-primary mt-3">
            <a class="text-white text-decoration-none" href="{{ route('admin.projects.create') }}">Create</a>
        </button>
    </section>
@endsection
