@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Edit {{ $project->title }} </h1>
        <div class="card p-3">
            <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="d-flex flex-row">
                    <div class="d-flex flex-column w-75">
                        <div class="mb-3">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                id="title" required value="{{ old('title', $project->title) }}">
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
                        {{-- type --}}
                        <div class="mb-3">
                            <label for="type_id">select a type</label>
                            <select type="text" class="form-control @error('type_id') is-invalid @enderror"
                                name="type_id" id="type_id">

                                <option value="" selected>select a type</option>
                                @foreach ($types as $type)
                                    {{-- metto la selezione della cat. se preso --}}
                                    <option value="{{ $type->id }}">

                                        {{-- {{ old('type_id') == $project->type_id ? 'selected' : '' }} --}}

                                        {{ $type->name }}</option>
                                @endforeach

                            </select>
                            @error('type_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="mb-3">
                            <label for="github">Github</label>
                            <input type="url" class="form-control @error('github') is-invalid @enderror" name="github"
                                id="github" value="{{ old('github', $project->github) }}">
                            @error('github')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label for="image">Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    name="image" id="image" value="{{ old('image') }}">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-flex p-4 ">
                        <div class="framed w-100 " style="height: fit-content;">
                            <img id="uploadPreview" style="width: 100%; "
                                @if ($project->image === '') src="https://picsum.photos/200/300"
                                @else
                                    src="{{ asset('storage/' . $project->image) }}" @endif>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </form>
        </div>
    </section>
@endsection
