<table>
    <tr>
        <th>Patient's name</th>
        <th>Patient's phone</th>
        <th>Date</th>
        <th>Comments</th>
    </tr>
    @foreach($appointments as $appointment)
    <tr>
        <td>{{ $appointment->patient_name }}</td>
        <td>{{ $appointment->patient_phone }}</td>
        <td>{{ $appointment->date->toDateTimeString() }}</td>
        <td>{{ $appointment->comments }}</td>
    </tr>
    @endforeach
</table>
