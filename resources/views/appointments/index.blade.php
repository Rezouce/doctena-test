@extends('layout')

@section('content')

<div class="row">
    <div class="col-sm-12 text-center">
        <h1>Appointments</h1>
    </div>
</div>
<div class="row">
    <div class="col-sm-8">
        <h2>Listing</h2>

        <table class="table table-striped table-bordered">
            <tr>
                <th>Patient's name</th>
                <th>Patient's phone</th>
                <th>Date</th>
                <th>Comments</th>
                <th>Actions</th>
            </tr>
            @foreach($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->patient_name }}</td>
                    <td>{{ $appointment->patient_phone }}</td>
                    <td>{{ $appointment->date->toDateTimeString() }}</td>
                    <td>{{ $appointment->comments }}</td>
                    <td>
                        <form method="post" action="/appointments/{{ $appointment->id }}">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="col-sm-4">
        <h2>New appointment</h2>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="/appointments">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="patient_name">Patient's name</label>
                <input type="text" class="form-control" id="patient_name" name="patient_name" required>
            </div>

            <div class="form-group">
                <label for="patient_phone">Patient's phone</label>
                <input type="text" class="form-control" id="patient_phone" name="patient_phone" required>
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="datetime" class="form-control" id="date" name="date" required>
            </div>

            <div class="form-group">
                <label for="patient_name">Comments</label>
                <textarea class="form-control" id="comments" name="comments"></textarea>
            </div>

            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>
@endsection
