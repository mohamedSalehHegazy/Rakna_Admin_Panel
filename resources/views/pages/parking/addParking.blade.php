@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Parking</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Parking</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        @php
        $flag = 0;
        if(isset($parking))
        $flag=1;
        @endphp
        
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
                @php
                    Session::forget('success');
                @endphp
            </div>
        @endif

        @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        <li>{{$err}}</li>
                    @endforeach
                </div>
        @endif
       
        <form method="POST"  class="w-75 mx-auto mt-3 pb-3" action="{{ $flag ? url('parkings/'.$parking->Parking_Id) : url('parkings')}}">
            @if($flag)
                @method('put')
            @endif
            {{csrf_field()}}
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">City Name</label>
                    <div class="col-sm-10">
                        <select class="custom-select" name="City_Id">
                            @foreach($cityName as $city)
                                <option value="{{$city->City_Id}}">{{$city->City_Name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Parking Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{$flag ? $parking->Parking_Name : ''}}" name="Parking_Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Parking Capacity</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" value="{{$flag ? $parking->Capacity : ''}}" name="Capacity">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Slot Fees/Hour</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" value="{{$flag ? $parking->Slot_FeesPerHour : ''}}" name="Slot_FeesPerHour" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Parking latitude</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{$flag ? $parking->latitude : ''}}" name="latitude" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Parking longitude</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{$flag ? $parking->longitude : ''}}" name="longitude" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="Desc" rows="3">{{$flag ? $parking->Desc : ''}}</textarea>
                    </div>
                </div>
                <div class="form-group row ">
                    <div class="col-sm-10 offset-md-2">
                     <button type="submit" class="btn btn-primary btn-block">{{$flag ? 'update' : 'Add'}}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection