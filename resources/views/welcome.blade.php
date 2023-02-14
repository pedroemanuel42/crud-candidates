@extends('candidates.layout')
@section('content')
<div class="container">
    <h1 style="padding: 60px; text-align:center;">Simple CRUD Using Laravel 9</h1>
    <a href="{{ url('/candidate') }}" class="btn btn-primary btn-lg" title="Go to CRUD" style="display:flex; flex-direction:column; justify-content:center; align-items:center; max-width: 200px; max-height: 50px; margin: 0 auto;">
        Go to CRUD
    </a>
</div>
@endsection