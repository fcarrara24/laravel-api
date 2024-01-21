@extends('layouts.admin')
@section('content')
    <section class="container py-3">
        <div class="card p-3 py-5">
            <h1 class="text-uppercase text-center">Edit {{ $type->name }} </h1>
            <div class=" p-3">
                <form action="{{ route('admin.types.update', $type) }}" method="POST" >
                    @csrf
                    @method('PUT')
                    <div class="d-flex flex-row">
                        <div class="d-flex flex-column w-75">
                            <div class="mb-3">
                                <label for="name">name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    id="name" required value="{{ old('name', $type->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="my-btn-primary">Submit</button>
                    <button type="reset" class="my-btn-primary">Reset</button>
                </form>
            </div>
        </div>
    </section>
@endsection
