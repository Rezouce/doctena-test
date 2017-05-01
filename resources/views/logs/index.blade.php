@extends('layout')

@section('content')

<div class="row">
    <div class="col-sm-12 text-center">
        <h1>Logs</h1>

        <table class="table table-striped table-bordered">
            @foreach($logs as $log)
                <tr>
                    <td>{{ $log }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
