@extends('layouts.admin')
@section('content')
    <section class="container py-3">
        <div class="card p-3 py-5">
            <h1 class=" text-uppercase text-center">Edit {{ $project->title }} </h1>

            <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="d-flex flex-row justify-content-center ">
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


                        <div class="mb-3">
                            <label for="type_id">Select type</label>
                            <select class="form-control @error('type_id') is-invalid @enderror" name="type_id"
                                id="type_id">
                                <option value="">Select a type</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}"
                                        {{ old('type_id', $project->type_id) == $type->id ? 'selected' : '' }}>
                                        {{ $type->name }}</option>
                                @endforeach
                            </select>
                            @error('type_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="d-flex flex-row justify-content-center">
                                <div class="form-group w-75">
                                    <h6>Select technologies</h6>
                                    @foreach ($technologies as $technology)
                                        <div class="form-check @error('technologies') is-invalid @enderror">
                                            @if ($errors->any())
                                                <input type="checkbox" class="form-check-input" name="technologies[]"
                                                    value="{{ $technology->id }}"
                                                    {{ in_array($technology->id, old('technologies', $project->technologies)) ? 'checked' : '' }}>
                                            @else
                                                <input type="checkbox" class="form-check-input" name="technologies[]"
                                                    value="{{ $technology->id }}"
                                                    {{ $project->technologies->contains($technology->id) ? 'checked' : '' }}>
                                            @endif
                                            <label class="form-check-label">
                                                {{ $technology->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                    @error('technologies')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="d-flex p-4 w-25">
                                    <div class="framed w-100 " style="height: fit-content;">
                                        <img id="uploadPreview" style="width: 100%; "
                                            @if ($project->image === '') src="https://picsum.photos/200/300"
                                            @else
                                                src="{{ asset('storage/' . $project->image) }}" @endif>
                                    </div>
                                </div>
                            </div>
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


                </div>
                <button type="submit" class="my-btn-primary">Submit</button>
                <button type="reset" class="my-btn-primary">Reset</button>

            </form>
        </div>
    </section>
@endsection
