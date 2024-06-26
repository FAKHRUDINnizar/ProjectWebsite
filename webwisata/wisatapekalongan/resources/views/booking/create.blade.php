@extends('booking.layout')
@section('content')
<div class="card">
    <div class="card-header">Booking Page</div>
    <div class="card-body">

    <form action="{{ url('bookings') }}" method="post">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br> 
        <label>Email</label></br>
        <input type="text" name="email" id="email" class="form-control"></br>
        <label>Date Time</label></br>
        <div class="form-floating date" id="date3" data-target-input="nearest">
        <input type="text" class="form-control bg-transparent datetimepicker-input" name="datetime" id="datetime" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" /></br>
        <label>Destination</label></div></br>
        <select class="form-select bg-transparent" name="destination" id="destination">
                <option value="1">Destination 1</option>
                <option value="2">Destination 2</option>
                <option value="3">Destination 3</option></select></br>
        <label>Message</label></br>
        <input type="text" name="message" id="message" class="form-control">
        <input type="Submit" value="Save" class="btn btn-success"></br>
    </form>

</div>
</div>
@stop