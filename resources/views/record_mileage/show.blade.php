@extends('layouts.app')

@section('content')
    <!-- <h1>Bootstrap starter template</h1>
    <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p> -->

    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="driver_name">Driver's Name</label>
                    <input type="text" class="form-control" id="driver_name" name="driver_name" value="{{$mileage->name}}" required>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Date</label>
                    <input type="text" class="form-control" id="mileage_date" name="mileage_date" value="{{date_format(date_create($mileage->date_drive),'d/m/Y')}}">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Mileage Before (Optional)</label>
                    <br>
                    <img id="before" src="/storage/img/{{$mileage->img_before}}" alt="your image" style="height: 50%;width: 50%" class="img_before">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Mileage After</label>
                    <br>
                    <img id="after" src="/storage/img/{{$mileage->img_after}}" alt="your image" style="height: 50%;width: 50%" class="img_after">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Purpose / Destination</label>
                    <textarea class="form-control" id="destination_purpose" rows="3" name="destination_purpose">{{$mileage->pur_destination}}</textarea>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Remarks (Optional)</label>
                    <textarea class="form-control" id="remarks" rows="2" name="remarks">{{$mileage->remarks}}</textarea>
                </div>
            </div>
        </div>
    </div>

@endsection