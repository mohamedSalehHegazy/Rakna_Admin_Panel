@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Cities</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Cities</li>
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
        if(isset($city))
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


        <form method="post" class="w-75 mx-auto mt-5 pb-3"
        action="{{ $flag ? url('cites/'.$city->City_Id) : url('cites')}}"
        enctype="multipart/form-data">
            @if($flag)
            @method('put')
            @endif
            {{csrf_field()}}

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">City Name</label>
                <div class="col-sm-10">
                    <input class="form-control" name="City_Name"  value="{{$flag ? $city->City_Name : ''}}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="Description" rows="3">{{$flag ? $city->Description: ''}}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">City Image</label>
                <div class="col-sm-10">
                    <input id="Upload" class="form-control-file" type="file" name="image" value="{{ $flag ? $city->image : ''}}">
                </div>
            </div>
            <div class="form-group row mt-md-5">
                <div class="col-sm-10 offset-md-2">
                 <button type="submit" class="btn btn-primary btn-block">{{$flag ? 'update' : 'Add'}}</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection