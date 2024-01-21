@extends('layouts.admin')
@section('content')
    <section class="container py-4">
        <div class="card p-4">
        <h1 class="text-center text-uppercase ">types Create</h1>

            <form action="{{ route('admin.types.store') }}" method="POST">
                @csrf
                <div class="d-flex flex-row justify-content-evenly flex-nowrap h-100">
                    <div class="w-75">
                        <div class="container ">
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
                <div><button type="submit" class="my-btn-primary">Submit</button></div>
                <div><button type="reset" class="my-btn-primary">Reset</button></div>
            </form>
        </div>
    </section>
@endsection
