
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
<section class="content pb-3">
    <div class="container-fluid ">
        
        <p><a href="offers/create" class="btn btn-primary">Add New Offers</a></p>
        <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Details</th>
                <th>Start_Date</th>
                <th>End_Date</th>
                <th>Action</th>
            </tr>
            @if (count($offer)==0)
                <tr>
                    <td colspan="6">No Offers</td>
                </tr>
            @else
                @foreach ($offer as $off)
                    <tr>
                        <td>{{$off->Offer_No}}</td>
                        <td>{{$off->Title}}</td>
                        <td>{{$off->Details}}</td>
                        <td>{{$off->Start_Date}}</td>
                        <td>{{$off->End_Date}}</td>
                        <td>
                            <form action="{{url('offers/'.$off->Offer_No)}}" method="POST" class="d-inline-block mb-2 ">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                            <a href="{{url('offers/'.$off->Offer_No)}}" class="btn btn-info mb-2 mb-md-0"><i class="fas fa-clipboard"></i></a>
                            <a href="{{url('offers/'.$off->Offer_No.'/edit')}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
        </div>
        <div class="d-none d-md-block">{{ $offer->links() }}</div>
    </div>
</section>

@endsection