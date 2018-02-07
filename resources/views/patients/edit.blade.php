@extends('layouts.index')
@section("title", "Edit patient")
@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ url('patients') }}">
                <button class="btn btn-secondary btn-sm float-right">Go back</button>
            </a>
            <h5 class="card-title">Edit patient ({{ $patient->patient_name }})</h5>
            <h6 class="card-subtitle mb-4 text-muted">Edit client #{{ $patient->patient_id }}</h6>

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
            <form method="POST" action="patients/edit/{{ $patient->patient_id }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="patient_name">Patient name</label>
                    <input type="text" class="form-control" name="patient_name" value="{{ $patient->patient_name }}">
                </div>
                <div class="form-group">
                    <label for="patient_name">Specie ID</label>
                    <input type="text" class="form-control" name="specie_id" value="{{ $patient->species_id }}">
                </div>
                <div class="form-group">
                    <label for="patient_name">Client ID</label>
                    <input type="text" class="form-control" name="client_id" value="{{ $patient->client_id }}">
                </div>
                <div class="form-group">
                    <label for="patient_name">Patient status</label>
                    <input type="text" class="form-control" name="patient_status" value="{{ $patient->patient_status }}">
                </div>
                <button type="submit" class="btn btn-primary">Edit patient</button>
            </form>
        </div>
    </div>
@endsection
