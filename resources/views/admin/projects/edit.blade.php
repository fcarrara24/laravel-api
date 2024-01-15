@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Edit {{ $project->title }} </h1>
        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/fom-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                    required value="{{ old('title', $project->title) }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="body">Body</label>
                <textarea type="text" class="form-control @error('body') is-invalid @enderror" name="body" id="body"
                    required>
                    {{ old('body', $project->body) }}
                </textarea>
                @error('body')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="github">Github</label>
                <input type="url" class="form-control @error('github') is-invalid @enderror" name="github"
                    id="github"  value="{{ old('github', $project->github) }}">
                @error('github')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image">Image</label>
                <input type="url" class="form-control @error('image') is-invalid @enderror" name="image"
                    id="image" value="{{ old('image', $project->image) }}">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </form>
    </section>
@endsection
