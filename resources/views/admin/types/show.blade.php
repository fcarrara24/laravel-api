@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="card p-5 mt-5">
            <h1 class=" text-center p-4">{{ $type->name }}</h1>
            <h2></h2>
            <table class="table table-striped ">
            <thead>
            <tr>
                <th scope="col">PROGETTI</th>

                <td scope="col">DESCRIZIONE</td>
            </tr>
            </thead>
            <tbody>

                @forelse ($type->projects as $project)
                    <tr>
                        <th class="list-group-item">
                            <a href="{{ route('admin.projects.show', $project->slug) }}"
                                class="link-underline link-underline-opacity-0">
                                {{ $project->title }}</a>
                        </th>
                        <td>
                            {{$project->description}}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <th>
                            non ci sono progetti della tipologia {{$type->name}}
                        </th>
                    </tr>
                @endforelse


            </tbody>
            </table>



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
        </div>
    @endsection
