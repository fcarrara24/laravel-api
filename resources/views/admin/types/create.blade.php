@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>types Create</h1>
        <div class="card p-4">
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
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </form>
        </div>
    </section>
@endsection
