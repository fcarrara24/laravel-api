@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Edit {{ $category->name }} </h1>
        <div class="card p-3">
            <form action="{{ route('admin.categories.update', $category) }}" method="POST" >
                @csrf
                @method('PUT')
                <div class="d-flex flex-row">
                    <div class="d-flex flex-column w-75">
                        <div class="mb-3">
                            <label for="name">name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="name" required value="{{ old('name', $category->name) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </form>
        </div>
    </section>
@endsection
