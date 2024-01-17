@extends('layouts.app')
@section('content')
    <section class="container">
        <h1 class=" text-center p-4">{{ $type->name }}</h1>

        @foreach ($type->projects as $project)
            <div>{{ $project->title }}</div>
        @endforeach
        <div class="d-flex flex-row justify-content-between align-items-center">
            <div class="d-flex flex-column @if ($type->image) w-50 @else w-100 @endif">


                <br>
                <div class="d-flex flex-row">
                    <button class="btn btn-primary d-inline-block">
                        <a class="text-white text-decoration-none"
                            href="{{ route('admin.types.edit', $type->slug) }}">Edit</a>
                    </button>
                    <form action="{{ route('admin.types.destroy', $type->slug) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger cancel-button delete-button">Delete</button>
                    </form>
                    @include('partials.modal_delete')

                </div>
            </div>

        </div>
    @endsection
