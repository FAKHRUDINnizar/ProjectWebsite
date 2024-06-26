@extends('booking.layout')

@section('content')
<div class="card">
    <div class="card-header">Contact Us Page</div>
    <div class="card-body">

    <form action="{{ url('bookings/' .$booking->id) }}" method="post"> 
        @csrf
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$booking->id}}" />
        <label>Name</label><br>
        <input type="text" name="name" id="name" value="{{$booking->name}}" class="form-control"><br>
        <label>Email</label><br>
        <input type="text" name="email" id="email" value="{{$booking->email}}" class="form-control"><br>
        <label>Date & Time</label><br>
        <input type="text" name="datetime" id="datetime" value="{{$booking->datetime}}" class="form-control"><br>
        <label>Destination</label><br>
        <input type="text" name="destination" id="destination" value="{{$booking->destination}}" class="form-control"><br>
        <label>Message</label><br>
        <input type="text" name="message" id="message" value="{{$booking->message}}" class="form-control"><br>
        <input type="submit" value="Update" class="btn btn-success"><br>
    </form>

</div>
</div>
@stop
