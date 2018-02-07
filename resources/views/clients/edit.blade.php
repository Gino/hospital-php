@extends('layouts.index')
@section("title", "Edit client")
@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ url('clients') }}">
                <button class="btn btn-secondary btn-sm float-right">Go back</button>
            </a>
            <h5 class="card-title">Edit client ({{ $client->client_firstname }} {{ $client->client_lastname }})</h5>
            <h6 class="card-subtitle mb-4 text-muted">Edit client #{{ $client->client_id }}</h6>

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
            <form method="POST" action="clients/edit/{{ $client->client_id }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="first_name">First name</label>
                    <input type="text" class="form-control" name="first_name" value="{{ $client->client_firstname }}">
                </div>
                <div class="form-group">
                    <label for="last_name">Last name</label>
                    <input type="text" class="form-control" name="last_name" value="{{ $client->client_lastname }}">
                </div>
                <button type="submit" class="btn btn-primary">Edit client</button>
            </form>
        </div>
    </div>
@endsection
