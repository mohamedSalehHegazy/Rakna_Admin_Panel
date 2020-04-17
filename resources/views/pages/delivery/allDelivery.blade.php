
@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Delivery</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Delivery</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid ">
        <div class="table-responsive">
        <table class="table  table-bordered table-striped text-center">
            <tr>
                <th>#</th>
                <th>Location</th>
                <th>Time</th>
                <th>CarNo</th>
                <th>car owner</th>
                <th>cartype</th>
                <th>employeename</th>
                <th>employeephone</th>
            </tr>
            @if (count($delivery)==0)
                <tr>
                    <td colspan="8">No delivery</td>
                </tr>
            @else
                @foreach ($delivery as $del)
                    <tr>
                        <td>{{$del->deliveryno}}</td>
                        <td>{{$del->location}}</td>
                        <td>{{$del->time}}</td>
                        <td>{{$del->carno}}</td>
                        <td>{{$del->userid}}</td>
                        <td>{{$del->cartype}}</td>
                        <td>{{$del->employeename}}</td>
                        <td>{{$del->employeephone}}</td>
                    </tr>
                @endforeach
            @endif
        </table>
        <div>{{ $delivery->links() }}</div>
        </div>
    </div>
</section>

@endsection