@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Projects List</h1>

        @if (!empty(session('message')))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif




        <table class="table">
            <thead>
                <tr>
                    <th scope="col w-75">TITOLO</th>

                    <th scope="col text-danger w-25">OPERAZIONI</th>
                </tr>
            </thead>


            <tbody>

                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->title }}</td>

                        <td class="d-flex flex-row justify-content-end align-items-center">
                            {{-- <a href="{{ route('admin.projects.show', $project->slug) }}" class="text-success">
                                mostra
                            </a>
                            <a href="{{ route('admin.projects.edit', $project->slug) }}" class="text-warning">
                                modifica
                            </a> --}}
                            <form class="d-inline-block" action="{{ route('admin.projects.show', $project->slug) }}"
                                method="GET">
                                @csrf

                                <button class="btn btn-danger cancel-button" type="submit"
                                    style="outline: none; border: 0; background: white;">
                                    <span class="text-decoration-underline text-success cancel-button">show</span></button>

                            </form>

                            <form class="d-inline-block" action="{{ route('admin.projects.edit', $project->slug) }}"
                                method="GET">
                                @csrf

                                <button class="btn btn-danger cancel-button" type="submit"
                                    style="outline: none; border: 0; background: white;">
                                    <span class="text-decoration-underline text-warning cancel-button">edit</span></button>

                            </form>

                            <form class="d-inline-block" action="{{ route('admin.projects.destroy', $project->slug) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger cancel-button" type="submit"
                                    style="outline: none; border: 0; background: white;">
                                    <span class="text-decoration-underline text-danger cancel-button">Delete</span></button>

                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>

        </table>

        <button class="btn btn-primary mt-3">
            <a class="text-white text-decoration-none" href="{{ route('admin.projects.create') }}">Create</a>
        </button>
    </section>
    @include('partials.modal_delete')
@endsection
