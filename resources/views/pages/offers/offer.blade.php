
@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Offers</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Offers</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid ">
        <table class="table  table-bordered table-striped text-center table-responsive">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Details</th>
                <th>Start_Date</th>
                <th>End_Date</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>{{$offer->Offer_No}}</td>
                <td>{{$offer->Title}}</td>
                <td>{{$offer->Details}}</td>
                <td>{{$offer->Start_Date}}</td>
                <td>{{$offer->End_Date}}</td>
                <td>
                    <form action="{{url('offers/'.$offer->Offer_No)}}" method="POST" class="d-inline-block mb-2">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                    <a href="{{url('offers')}}" class="btn btn-info"><i class="fas fa-clipboard"></i></a>
                    <a href="{{url('offers/'.$offer->Offer_No.'/edit')}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                </td>
            </tr>
        </table>
    </div>
</section>

@endsection