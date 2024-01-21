@extends('layouts.admin')
@section('content')
    <section class="container card p-5 mt-5 ">
        <h1 class="text-center">types List</h1>

        @if (!empty(session('message')))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <div class="d-flex flex-row justify-content-end w-100 ">
            <button class="color-primary-back invisible-button m-4 d-block ">
                <a class=" text-decoration-none color-primary-back invisible-button" style="width: fit-content;"
                    href="{{ route('admin.types.create') }}"><i class="fa-solid fa-plus"></i></a>
            </button>
        </div>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col w-75">TITOLO</th>

                    <th scope="col text-danger w-100 d-flex justify-content-end"
                        style="text-align: end; padding-right: 20px;">OPERAZIONI</th>
                </tr>
            </thead>


            <tbody>

                @foreach ($types as $type)
                    <tr>
                        <td>{{ $type->name }}</td>

                        <td class="d-flex flex-row justify-content-end align-items-center">

                            <form class="d-inline-block" action="{{ route('admin.types.show', $type->slug) }}"
                                method="GET">
                                @csrf

                                <button class="my-btn-primary cancel-button" $type="submit">
                                    <i class="fa-solid fa-eye"></i>
                                </button>

                            </form>

                            <form class="d-inline-block" action="{{ route('admin.types.edit', $type->slug) }}"
                                method="GET">
                                @csrf

                                <button class="my-btn-primary cancel-button" $type="submit">
                                    <i class="fa-solid fa-wrench"></i>
                                </button>

                            </form>

                            <form class="d-inline-block" action="{{ route('admin.types.destroy', $type->slug) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="my-btn-primary cancel-button delete-button" $type="submit">
                                    <i class="fa-solid fa-trash"></i>
                            </form>


                        </td>
                        @include('partials.modal_delete')

                    </tr>
                @endforeach
            </tbody>

        </table>
        {{ $types->links('vendor.pagination.bootstrap-5') }}


    </section>
@endsection
