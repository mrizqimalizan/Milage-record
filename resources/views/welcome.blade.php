@extends('layouts.app')

@section('content')
    <!-- <h1>Bootstrap starter template</h1>
    <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p> -->

    <style>

        .img_before{
            display: none;
        }

        .img_after{
            display: none;
        }

    </style>

    @if(session()->has('success'))
        <div class="alert alert-success" autoclose>
            {{ session()->get('success') }}
        </div>
    @endif

    <form action="/mileage" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="driver_name">Driver's Name</label>
                    <input type="text" class="form-control" id="driver_name" name="driver_name" placeholder="Enter Name" required>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Date</label>
                    <input type="text" class="form-control" id="mileage_date" name="mileage_date" placeholder="dd-mm-yyyy">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Mileage Before (Optional)</label>
                    <input type="file" class="form-control-file" id="milage_img_before" name="before_img">
                    <img id="before" src="#" alt="your image" style="height: 50%;width: 50%" class="img_before">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Mileage After</label>
                    <input type="file" class="form-control-file" id="milage_img_after" name="after_img">
                    <img id="after" src="#" alt="your image" style="height: 50%;width: 50%" class="img_after">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Purpose / Destination</label>
                    <textarea class="form-control" id="destination_purpose" rows="3" name="destination_purpose"></textarea>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Remarks (Optional)</label>
                    <textarea class="form-control" id="remarks" rows="2" name="remarks"></textarea>
                </div>
            </div>
            <div class="col-sm-12">
                <button class="btn btn-primary" value="submit" type="submit" style="width: 100%;">Submit</button>
            </div>
        </div>
    </form>

    <script>
    function readURL(input) 
    {
    if (input.files && input.files[0]) 
        {
            var reader = new FileReader();
            
            reader.onload = function (e) 
            {
                $('#before').attr('src', e.target.result);
                document.getElementById("before").style.display="block";
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#milage_img_before").change(function(){
        readURL(this);
    });

    function readURL1(input) 
    {
    if (input.files && input.files[0]) 
        {
            var reader = new FileReader();
            
            reader.onload = function (e) 
            {
                $('#after').attr('src', e.target.result);
                document.getElementById("after").style.display="block";
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#milage_img_after").change(function(){
        readURL1(this);
    });

    //for date
    $(function(){
        if ( $('#mileage_date').type = 'date' )
        {
            $('#mileage_date').datepicker({
                'format':'dd-mm-yyyy',
                'autoclose': true
            });
            $('#mileage_date').datepicker('update',new Date());
        }
    });
    </script>
@endsection