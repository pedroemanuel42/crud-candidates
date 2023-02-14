@extends('candidates.layout')
@section('content')
<div class="container">
    <div class="row" style="margin:20px">
        <div class="col-12">
            <div class="card">
                <div class="class-header">
                    <h2 style="margin: 20px;">Laravel 9 CRUD - Candidates List</h2>
                </div>

                <div class="card-body">
                    <a href="{{ url('/candidate/create') }}" class="btn btn-success btn-sm" title="Add New Candidate">
                        Add New Candidate
                    </a><br><br>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Hobbies</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($candidates as $candidate)
                                <tr>
                                    <td>{{ $loop-> iteration }}</td>
                                    <td>{{ ucwords($candidate->name) }}</td>
                                    <td>{{ $candidate->email }}</td>
                                    <td>{{ $candidate->state }}</td>
                                    <td>{{ $candidate->city }}</td>
                                    <td>{{ ucwords($candidate->hobbies) }}</td>

                                    <td>
                                        <a href="{{ url('/candidate/' . $candidate->id) }}" title="See Candidate"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> See</button></a>
                                        <a href="{{ url('/candidate/' . $candidate->id . '/edit') }}" title="Edit Candidate"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                        <form method="POST" action="{{ url('/candidate' . '/' . $candidate->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Candidate" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection