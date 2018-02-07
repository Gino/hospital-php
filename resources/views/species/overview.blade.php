@extends('layouts.index')
@section("title", "Species")
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <a href="species/add">
                    <button type="button" class="btn btn-primary btn-sm float-right">Add a specie</button>
                </a>
                <h5 class="card-title">Species <span
                            class="badge badge-pill badge-secondary">{{ $species->count() }}</span></h5>
                <h6 class="card-subtitle mb-4 text-muted">A simple overview of all the species</h6>

                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Description</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($species as $specie)
                    <tr>
                        <th scope="row">{{ $specie->species_id }}</th>
                        <td>{{ $specie->species_description }}</td>
                        <td>
                            <a href="species/edit/{{ $specie->species_id }}">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>
                            </a>
                        </td>
                        <td>
                            <form action="species/delete/{{ $specie->species_id }}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
