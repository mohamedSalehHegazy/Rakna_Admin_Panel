
@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Employees</h1>
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
        <div class="container-fluid ">
            <table class="table  table-bordered table-striped text-center">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phon</th>
                    <th>Status</th>
                    <th>parking Name</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>{{$employee->employeeid}}</td>
                    <td>{{$employee->employeename}}</td>
                    <td>{{$employee->employeephone}}</td>
                    <td>
                        <a href="{{url('status/'.$employee->employeeid.'/'.$employee->status)}}" 
                            @if($employee->status == 0) 
                                class="btn btn-success"> activate
                            @else 
                                class="btn btn-danger"> deactivate
                            @endif
                        </a>
                    </td>
                    <td>{{$employee->Parking_Name}}</td>
                    <td>
                        <form action="{{url('employees/'.$employee->employeeid)}}" method="POST" class="d-inline-block">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger mb-1 mb-md-0">Delete</button>
                        </form>
                        <a href="{{url('employees')}}" class="btn btn-info mb-1 mb-md-0">Show All</a>
                        <a href=" {{url('employees/'.$employee->employeeid.'/edit')}}" class="btn btn-success mb-1 mb-md-0">Edit</a>
                    </td>
                </tr>
            </table>
        </div>
    </section>
@endsection