@extends('layouts.index')
@section("title", "Patients")
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <a href="patients/add">
                    <button type="button" class="btn btn-primary btn-sm float-right">Add a patient</button>
                </a>
                <h5 class="card-title">Patients <span
                            class="badge badge-pill badge-secondary">{{ $patients->count() }}</span></h5>
                <h6 class="card-subtitle mb-4 text-muted">A simple overview of all the patients</h6>

                <thead>
                <tr>
                    <th scope="col"><a href="@if (Request::segment(2) == "desc")
                            {{ url('patients/asc/id') }}
                            @elseif (Request::segment(2) == "asc")
                            {{ url('patients/desc/id') }}
                        @endif
                        ">ID</a></th>
                    <th scope="col"><a href="@if (Request::segment(2) == "desc")
                            {{ url('patients/asc/name') }}
                            @elseif (Request::segment(2) == "asc")
                            {{ url('patients/desc/name') }}
                        @endif
                        ">Name</a></th>
                    <th scope="col"><a href="@if (Request::segment(2) == "desc")
                            {{ url('patients/asc/species_id') }}
                            @elseif (Request::segment(2) == "asc")
                            {{ url('patients/desc/species_id') }}
                        @endif
                        ">Specie ID</a></th>
                    <th scope="col"><a href="@if (Request::segment(2) == "desc")
                            {{ url('patients/asc/client_id') }}
                            @elseif (Request::segment(2) == "asc")
                            {{ url('patients/desc/client_id') }}
                        @endif
                        ">Client ID</a></th>
                    <th scope="col"><a href="@if (Request::segment(2) == "desc")
                            {{ url('patients/asc/patient_status') }}
                            @elseif (Request::segment(2) == "asc")
                            {{ url('patients/desc/patient_status') }}
                        @endif
                        ">Patient description</a></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($patients as $patient)
                    <tr>
                        <th scope="row">{{ $patient->patient_id }}</th>
                        <td>{{ $patient->patient_name }}</td>
                        <td>{{ $patient->species_id }}</td>
                        <td>{{ $patient->client_id }}</td>
                        <td>{{ $patient->patient_status }}</td>
                        <td>
                            <a href="patients/edit/{{ $patient->patient_id }}">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>
                            </a>
                        </td>
                        <td>
                            <form action="patients/delete/{{ $patient->patient_id }}" method="POST">
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
