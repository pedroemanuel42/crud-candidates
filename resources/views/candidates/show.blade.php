@extends('candidates.layout')
@section('content')

<div class="card" style="margin:20px">
    <div class="card-header">Candidate Page</div>
    <div class="card-body">
        <div class="card-body">
            <h5 class="card-title">Name: {{ ucwords($candidates->name) }}</h5>
            <p class="card-text">Email: {{ $candidates->email }}</p>
            <p class="card-text">State: {{ $candidates->state }}</p>
            <p class="card-text">City: {{ $candidates->city }}</p>
            <p class="card-text">Hobbies: {{ $candidates->hobbies }}</p>
        </div>

        <a href="{{ url('/candidate/' . $candidates->id . '/edit') }}" title="Edit Candidate"><button class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

        <form method="POST" action="{{ url('/candidate' . '/' . $candidates->id) }}" accept-charset="UTF-8" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger" title="Delete Candidate" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
        </form>
        
        <a href="{{ url('candidate/') }}" class="btn btn-primary">Back</a>
        </hr>
    </div>
</div>