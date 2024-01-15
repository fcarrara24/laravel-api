@extends('layouts.app')
@section('content')

    <section class="container card p-5 mt-5 ">
        <h1 class="text-center">Projects List</h1>

        @if (!empty(session('message')))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif




        <table class="table">
            <thead>
                <tr>
                    <th scope="col w-75">TITOLO</th>

                    <th scope="col text-danger w-100 d-flex justify-content-end" style="text-align: end; padding-right: 20px;">OPERAZIONI</th>
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

                                <button class="btn btn-success cancel-button" type="submit">
                                    <i class="fa-solid fa-eye"></i>
                                </button>

                            </form>

                            <form class="d-inline-block" action="{{ route('admin.projects.edit', $project->slug) }}"
                                method="GET">
                                @csrf

                                <button class="btn btn-warning cancel-button" type="submit">
                                    <i class="fa-solid fa-wrench"></i>
                                </button>

                            </form>

                            <form class="d-inline-block" action="{{ route('admin.projects.destroy', $project->slug) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger cancel-button delete-button" type="submit">
                                    <i class="fa-solid fa-trash"></i>
                            </form>


                        </td>
                        @include('partials.modal_delete')

                    </tr>
                @endforeach
            </tbody>

        </table>

        <button class="btn btn-primary mt-3 d-block" >
            <a class="text-white text-decoration-none " style="width: fit-content;" href="{{ route('admin.projects.create') }}">Create</a>
        </button>
    </section>

@endsection
