@extends('booking.layout')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-9">
<div class="card">
<div class="card-header">
<h2> LARVEL 9 CRUD </h2>
</div>
<div class="card-body">
    <a href="{{ url('/bookings/create') }}" class="btn btn-success btn-sm" tittle="Booking">
        <i class="fa fa-plus" aria-hidden="true"></i> Booking New </a>
</br>
</br>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date & Time</th>
                <th>Destintaion</th>
                <th>Message</th>
</tr>
</thead>
<tbody>
    @foreach($booking as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->email }}</td>
        <td>{{ $item->datetime }}</td>
        <td>{{ $item->destination }}</td>
        <td>{{ $item->message }}</td>
        <td>
            <a href="{{ url('/bookings/' . $item->id) }}" tittle="view Booking">
                <button class="btn btn-info btn-sm"><i class=fa fa-eye" aria- hidden="true"></i> View</button></a>
            <a href="{{ url('/bookings/' .$item->id .'/edit') }}" tittle="Edit Booking">
                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </button></a>
            <form method="POST" action="{{ url('/bookings' . '/' . $item->id) }}" accept-charshet="UTF-8" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" tittle="DELETE Pesanan" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>
            DELETE</button>
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