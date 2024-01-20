@extends('layouts.app')
@section('content')
    <section class="container card p-5 mt-5">
        <h1 class=" text-center p-4">{{ $technology->name }}</h1>

        @if (count($technology->projects))
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th scope="col">PROGETTI</th>
                        <td scope="col">DESCRIZIONE</td>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($technology->projects as $project)
                        <tr>
                            <th class="list-group-item">
                                <a href="{{ route('admin.projects.show', $project->slug) }}"
                                    class="link-underline link-underline-opacity-0">
                                    {{ $project->title }}</a>
                            </th>
                            <td>
                                {{ $project->body ?? $project->github }}
                            </td>

                        </tr>
                    @endforeach


                </tbody>
            </table>
        @else
            <div class="text-center ">non ci sono progetti della tipologia {{ $technology->name }}</div>
        @endif

        <div class="d-flex flex-row justify-content-between align-items-center">
            <div class="d-flex flex-column @if ($technology->image) w-50 @else w-100 @endif">


                <br>
                <div class="d-flex flex-row">
                    <button class="btn btn-primary d-inline-block">
                        <a class="text-white text-decoration-none"
                            href="{{ route('admin.technologies.edit', $technology->slug) }}">Edit</a>
                    </button>
                    <form action="{{ route('admin.technologies.destroy', $technology->slug) }}" method="POST"
                        class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button technology="submit" class="btn btn-danger cancel-button delete-button">Delete</button>
                    </form>
                    @include('partials.modal_delete')

                </div>
            </div>

        </div>
    @endsection
