@extends('layouts.admin')

@section('content')
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
    <div class="container-fluid row ">
      <div class="col-12 mb-3">
        <a href="{{url('parkings/create')}}" class="btn btn-success">Add New Parking</a>
      </div>
      <div class="col-12 row">
        @if(count($Parkings)==0)
          <p class="alert alert-warning"> No Parkings Available</p>
        @else
          @foreach($Parkings as $park)
          <div class="col-md-6 col-12">
            <!-- small box 94b3eb #a0c7de #a5b9da color:#f0f0f0-->
            <div class="small-box p-2 bg-info">
              <div class="inner">
                <h3 class="card-title">{{$park->Parking_Name}}</h3>
                <div class="card-text">
                  <h4>Capacity : {{$park->Capacity}}</h4>
                </div>
                <div class="card-text">
                  <h4>Slot Fees/Hour : {{$park->Slot_FeesPerHour}}</h4>
                </div>
                <div class="card-text">
                  <h4>Location of Parking:</h4>
                  <h5 class="ml-5">{{$park->latitude}}</h5>
                  <h5 class="ml-5">{{$park->longitude}}</h5>
                </div>
                <div class="card-text">
                  <h4>Description :</h4>
                  <p class="ml-5"> {{$park->Desc}}</p>
                </div>
              </div>
              <div class="row d-flex justify-content-center">
              <!-- Delete Button -->
              <form method="post" action="{{url('parkings/'.$park->Parking_Id)}}">
              {{csrf_field()}}
              @method('delete')
              <button type="submit" class="btn btn-danger mb-2">Delete</button>
              </form>
              <!-- Edit Button -->
              <form method="post" action="{{url('parkings/'.$park->Parking_Id.'/edit')}}">
              {{csrf_field()}}
              @method('get')
              <button type="submit" class="btn btn-warning ml-2 mb-2">Edit</button>
              </form>
              </div>
            </div>
          </div>
          @endforeach
        @endif
      </div>
    </div>
  </section>
@endsection