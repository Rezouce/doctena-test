@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <h2>Update appointment</h2>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="/appointments/{{ $appointment->id }}">
            {{ csrf_field() }}
            {{ method_field('put') }}

            <div class="form-group">
                <label for="patient_name">Patient's name</label>
                <input type="text" class="form-control" id="patient_name" name="patient_name" required value="{{ $appointment->patient_name }}">
            </div>

            <div class="form-group">
                <label for="patient_phone">Patient's phone</label>
                <input type="text" class="form-control" id="patient_phone" name="patient_phone" required value="{{ $appointment->patient_phone }}">
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="datetime" class="form-control" id="date" name="date" required value="{{ $appointment->date }}">
            </div>

            <div class="form-group">
                <label for="patient_name">Comments</label>
                <textarea class="form-control" id="comments" name="comments">{{ $appointment->comments }}</textarea>
            </div>

            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>
@endsection
