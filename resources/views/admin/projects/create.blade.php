@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Projects Create</h1>
        <div class="card p-4">
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="d-flex flex-row justify-content-evenly flex-nowrap h-100">
                    <div class="w-75">
                        <div class="container ">
                            <div class="mb-3">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" id="title" required maxlength="200" minlength="3"
                                    value="{{ old('title') }}">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="body">Body</label>
                                <textarea type="text" class="form-control @error('body') is-invalid @enderror" name="body" id="body" required
                                    maxlength="200" minlength="3">
                                    {{ old('body') }}
                                </textarea>
                                @error('body')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="category_id">select category_id</label>
                                <select type="text" class="form-control @error('category_id') is-invalid @enderror"
                                    name="category_id" id="category_id">

                                    <option value="" selected>select a category</option>
                                    @foreach ($categories as $category)
                                        {{-- metto la selezione della cat. se preso --}}
                                        <option value="{{ $category->id }}">

                                            {{-- {{ old('category_id') == $project->category_id ? 'selected' : '' }} --}}

                                            {{ $category->name }}</option>
                                    @endforeach

                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
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
                    <div class="d-flex p-3 framed">

                        <img id="uploadPreview" style="width: 100%;" src="https://picsum.photos/400/250">

                    </div>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </form>
        </div>
    </section>
@endsection
