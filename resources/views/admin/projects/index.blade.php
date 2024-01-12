@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Projects List</h1>

        @if (!empty(session('message')))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif


        {{-- <div class="mt-2 d-block position-relative border border-2 p-3 rounded"
                href="{{ route('admin.projects.show', $project->id) }}">
                {{ $project->title }}
                <a href="{{ route('admin.projects.show', $project->id) }}">
                    <i class="fa-solid fa-eye position-absolute top-25 end-0 text-success me-1 fs-5"></i>
                </a>

                <a href="{{ route('admin.projects.destroy', $project->id) }}" class="text-danger">
                    <i class="fa-solid fa-trash position-absolute top-25 text-danger me-1 fs-5" style="right: 50px"></i>
                </a>
            </div> --}}

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Titolo</th>
                    <th scope="col text-success">Mostra</th>
                    <th scope="col text-warning">Modifica</th>
                    <th scope="col text-danger">Cancella</th>
                </tr>
            </thead>


            <tbody>

                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->title }}</td>
                        <td>
                            <a href="{{ route('admin.projects.show', $project->id) }}" class="text-success">
                                mostra
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="text-warning">
                                modifica
                            </a>
                        </td>
                        <td>

                            <form class="d-inline-block" action="{{ route('admin.projects.destroy', $project->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"
                                    style="outline: none; border: 0; background: white;"><span
                                        class="text-decoration-underline text-danger">Delete</span></button>
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
@endsection
