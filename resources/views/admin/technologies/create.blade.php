@extends('layouts.admin')
@section('content')
    <section class="container py-5">
        <div class="card p-4 ">
        <h1 class="text-center text-uppercase">technologies Create</h1>

            <form action="{{ route('admin.technologies.store') }}" method="POST">
                @csrf
                <div class="d-flex flex-row justify-content-evenly flex-nowrap h-100">
                    <div class="w-75">
                        <div >
                            <div class="mb-3">
                                <label for="name">name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    id="name" required maxlength="200" minlength="3" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>

                </div>

            </form>
            <button type="submit" class=" my-btn-primary">Submit</button>
            <button type="reset" class=" my-btn-primary">Reset</button>

        </div>
    </section>
@endsection
