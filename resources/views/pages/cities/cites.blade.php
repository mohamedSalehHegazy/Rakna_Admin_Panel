@extends('layouts.admin')

@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Cities</h1>
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
    <div class="container-fluid row ">
      <div class="col-12 mt-3">
        <a href="{{url('cites/create')}}" class="btn btn-success">Add New City</a>
      </div>
      <div class="card-columns mt-3">
        @if(count($cites)==0)
          <p class="alert alert-warning"> No Cities Available</p>
        @else
          @foreach($cites as $city)
            <div class="card ">
              <img src="{{asset('img/'.$city->image)}}" class="card-img-top">
              <div class="card-body">
                <h4 class="card-title mb-2">{{$city->City_Name}}</h4>
                <p class="card-text">{{$city->Description}}</p>
                <div class="row d-flex justify-content-center">
                  <!-- Delete Button -->
                  <form method="post" action="cites/{{$city->City_Id}}"
                          enctype="multipart/form-data">
                          {{csrf_field()}}
                          @method('delete')
                          <button type="submit" class="btn btn-danger ">Delete</button>
                          </form>
                    <!-- Edit Button -->
                      <form method="post" 
                      action="cites/{{$city->City_Id}}/edit"
                      enctype="multipart/form-data">
                          {{csrf_field()}}
                          @method('get')
                          <button type="submit" class="btn btn-warning ml-2">Edit</button>
                          </form>
                          </div>
                          <form method="post" action="parkings/{{$city->City_Id}}"
                          enctype="multipart/form-data">
                          {{csrf_field()}}
                          @method('get')
                          <button type="submit" class="btn small-box-footer mt-2 ">Show Parkings <i class="fas fa-arrow-circle-right"></i></button>
                          </form>
                      
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  </section>
@endsection