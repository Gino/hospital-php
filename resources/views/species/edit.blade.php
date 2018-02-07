@extends('layouts.index')
@section("title", "Edit specie")
@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ url('species') }}">
                <button class="btn btn-secondary btn-sm float-right">Go back</button>
            </a>
            <h5 class="card-title">Edit specie ({{ $specie->species_id }})</h5>
            <h6 class="card-subtitle mb-4 text-muted">Edit client #{{ $specie->species_id }}</h6>

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form method="POST" action="{{ url('/species/edit/' . $specie->specie_id) }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" value="{{ $specie->species_description }}">
                </div>
                <button type="submit" class="btn btn-primary">Edit specie</button>
            </form>
        </div>
    </div>
@endsection
