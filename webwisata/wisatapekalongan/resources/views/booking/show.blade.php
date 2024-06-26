@extends('booking.layout')
@section('conten')
<div class="card">
    <div class="card-header">Booking Page</div>
    <div class="card-body">
        <div class="card-body">
            <h5 class="card-tittle">Name : {{$booking->name}}</h5>
            <p class="card-text">Email : {{$booking->email}}</p>
            <p class="card-text">Dete & Time : {{$booking->datetime}}</p>
            <p class="form-select">Destination : {{$booking->destination}}</p>
            <p class="card-text">Message : {{$booking->Message}}</p>
</div>

</hr>
</div>
</div>