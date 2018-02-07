@extends('layouts.index')
@section('title', 'Clients')
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <a href="clients/add">
                    <button type="button" class="btn btn-primary btn-sm float-right">Add a client</button>
                </a>
                <h5 class="card-title">Clients <span
                            class="badge badge-pill badge-secondary">{{ $clients->count() }}</span></h5>
                <h6 class="card-subtitle mb-4 text-muted">A simple overview of all the clients</h6>

                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <th scope="row">{{ $client->client_id }}</th>
                        <td>{{ $client->client_firstname }}</td>
                        <td>{{ $client->client_lastname }}</td>
                        <td>
                            <a href="clients/edit/{{ $client->client_id }}">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>
                            </a>
                        </td>
                        <td>
                            <form action="clients/delete/{{ $client->client_id }}" method="POST">
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
