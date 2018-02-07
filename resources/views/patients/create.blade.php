@extends('layouts.index')
@section("title", "Add patient")
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add patient</h5>
            <h6 class="card-subtitle mb-4 text-muted">Add a patient via this form</h6>

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
            <form method="POST" action="{{ url('patients/add') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="name">Specie</label>
                    <p>
                        <select name="specie" class="form-control">
                            @foreach ($species as $specie)
                                <option value="{{ $specie->species_id }}">{{ $specie->species_description }}</option>
                            @endforeach
                        </select>
                    </p>
                </div>
                <div class="form-group">
                    <label for="name">Client</label>
                    <p>
                        <select name="client" class="form-control">
                            @foreach ($clients as $client)
                                <option value="{{ $client->client_id }}">{{ $client->client_firstname }} {{ $client->client_lastname }}</option>
                            @endforeach
                        </select>
                    </p>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" name="status" placeholder="Patient status">
                </div>
                <button type="submit" class="btn btn-primary">Add patient</button>
            </form>
        </div>
    </div>
@endsection
