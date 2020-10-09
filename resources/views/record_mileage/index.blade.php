@extends('layouts.app')

@section('content')
    <!-- <h1>Bootstrap starter template</h1>
    <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p> -->
    @foreach($mileage as $mile)
    <div class="card shadow">
        <div class="card-body">
            <h5 class="card-title">{{ date_format(date_create($mile->date_drive),'d/m/Y') }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{$mile->name}}</h6>
            <p class="card-text">{{$mile->pur_destination}}</p>
            <a href="mileage/{{$mile->id}}" class="card-link btn btn-primary btn-sm">More Details</a>
        </div>
    </div>
    <br>
    @endforeach

@endsection