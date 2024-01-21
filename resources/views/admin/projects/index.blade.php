@extends('layouts.admin')
@section('content')
    <section class="container card p-5 mt-5 ">
        <h1 class="text-center text-uppercase ">Projects List</h1>

        <div class="d-flex flex-row justify-content-end w-100 ">
            <button class="color-primary-back invisible-button m-4 d-block ">
                <a class=" text-decoration-none color-primary-back invisible-button" style="width: fit-content;"
                    href="{{ route('admin.projects.create') }}"><i class="fa-solid fa-plus"></i></a>
            </button>
        </div>


        @if (!empty(session('message')))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif



        <table class="table">
            <thead>
                <tr>
                    <th scope="col w-75">TITOLO</th>

                    <th scope="col text-danger w-100 d-flex justify-content-end"
                        style="text-align: end; padding-right: 20px;">OPERAZIONI</th>
                </tr>
            </thead>


            <tbody>

                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->title }}</td>

                        <td class="d-flex flex-row justify-content-end align-items-center">

                            <form class="d-inline-block" action="{{ route('admin.projects.show', $project->slug) }}"
                                method="GET">
                                @csrf

                                <button class="color-primary-back invisible-button" type="submit">
                                    <i class="fa-solid fa-eye"></i>
                                </button>

                            </form>

                            <form class="d-inline-block" action="{{ route('admin.projects.edit', $project->slug) }}"
                                method="GET">
                                @csrf

                                <button class="color-primary-back invisible-button " type="submit">
                                    <i class="fa-solid fa-wrench"></i>
                                </button>

                            </form>

                            <form class="d-inline-block" action="{{ route('admin.projects.destroy', $project->slug) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="color-primary-back invisible-button" type="submit">
                                    <i class="fa-solid fa-trash"></i>
                            </form>


                        </td>
                        @include('partials.modal_delete')

                    </tr>
                @endforeach
            </tbody>

        </table>
        {{ $projects->links('vendor.pagination.bootstrap-5') }}


    </section>
@endsection
