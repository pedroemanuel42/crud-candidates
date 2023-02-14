@extends('candidates.layout')
@section('content')

<div class="card" style="margin:20px">
    <div class="card-header">Edit Candidate</div>
    <div class="card-body">
        <form action="{{ url('candidate/' .$candidates->id) }}" method="POST">
            {!! csrf_field() !!}
            @method("PATCH")
            <label>Name: </label></br>
            <input type="text" name="name" id="name" class="form-control" value="{{ $candidates->name }}"></br>

            <label>Email: </label></br>
            <input type="email" name="email" id="email" class="form-control" value="{{ $candidates->email }}"></br>

            <label for="state">State: </label></br>
            <select id="state" name="state" class="form-control">
                <option value="">Select the state</option>
                @foreach ($states as $state)
                <option value="{{ $state->name }}">{{ $state->name }}</option>
                @endforeach
            </select></br>

            <label for="city">City: </label></br>
            <select id="city" name="city" class="form-control">
                <option value="">Select the city</option>
            </select><br>

            <label for="hobbies">Hobbies: </label></br>
            @foreach ($hobbies as $index => $hobby)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox{{ $index + 1 }}" value="{{ $hobby->name }}" name="hobbies[]">
                <label class="form-check-label" for="inlineCheckbox{{ $index + 1 }}">{{ $hobby->name }}</label>
            </div>
            @endforeach

            </br>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ url('candidate/') }}" class="btn btn-primary">Cancel</a>
        </form>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/states-cities.js') }}"></script>

@stop