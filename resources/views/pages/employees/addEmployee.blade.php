@php
    $flag = 0;
    if(isset($employee)) $flag=1;
@endphp
@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Employees</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if (Session::has('success'))
                {{Session::get('success')}}
                @php
                    Session::forget('success');
                @endphp
            @endif
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                        <li>{{$err}}</li>
                    @endforeach
                </div>
            @endif
            
            <form method="POST"  class="w-75 mx-auto mt-3 mt-md-5 pb-3" action="{{$flag? url('employees/'.$employee->employeeid):url('employees')}}">
                @if($flag)
                    @method('put')
                @endif
                {{csrf_field()}}
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Employee Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="employeename" value="{{ $flag ? $employee->employeename : ''}}">
                    </div>
                </div>
                {{-- @if ($errors->has('employeename'))
                    <p>{{$errors->first('employeename')}}</p>
                @endif --}}
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Employee Phone</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" value="{{ $flag ? $employee->employeephone : ''}}" name="employeephone">
                    </div>
                </div>
                {{-- <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Employee Status</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" value="{{ $flag ? $employee->status : ''}}" name="status">
                    </div>
                </div> --}}
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Parking Name</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="Parking_id">
                            @foreach($parkingName as $pname )
                            <option value="{{$pname->Parking_Id}}">{{$pname->Parking_Name}}</option>
                            @endforeach
                        </select>
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