
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
            <p><a href="employees/create" class="btn btn-primary">Add New Employee</a></p>
            <div class="table-responsive">
            <table class="table  table-bordered table-striped text-center">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phon</th>
                    <th>Status</th>
                    <th>parking Name</th>
                    <th>Action</th>
                </tr>
                @if (count($employee)==0)
                    <tr>
                        <td>No Employees</td>
                    </tr>
                @else
                    @foreach ($employee as $emp)
                        <tr>
                            <td>{{$emp->employeeid}}</td>
                            <td>{{$emp->employeename}}</td>
                            <td>{{$emp->employeephone}}</td>
                            <td>
                                <a href="{{url('status/'.$emp->employeeid.'/'.$emp->status)}}" 
                                    @if($emp->status == 0) 
                                        class="btn btn-success"> activate
                                    @else 
                                        class="btn btn-danger">deactivate
                                    @endif
                                </a>
                            </td>
                            <td>{{$emp->Parking_Name}}</td>
                            <td>
                                <form action="{{url('employees/'.$emp->employeeid)}}" method="POST" class="d-inline-block">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger mb-1 mb-md-0">Delete</button>
                                </form>
                                
                                {{-- <a href="{{route('employees.destroy',$emp->employeeid)}}" class="btn btn-danger">Delete</a>  --}}
                                <a href="{{url('employees/'.$emp->employeeid)}}" class="btn btn-info mb-1 mb-md-0">Show</a>
                                <a href="{{url('employees/'.$emp->employeeid.'/edit')}}" class="btn btn-success mb-1 mb-md-0">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
            <div>{{ $employee->links() }}</div>
            </div>
        </div>
    </section>
@endsection