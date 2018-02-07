@extends('layouts.index')
@section("title", "Add specie")
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add specie</h5>
            <h6 class="card-subtitle mb-4 text-muted">Add a specie via this form</h6>

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
            <form method="POST" action="{{ url('species/add') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Description</label>
                    <input type="text" class="form-control" name="description" placeholder="Kat">
                </div>

                <button type="submit" class="btn btn-primary">Add specie</button>
            </form>
        </div>
    </div>
@endsection
