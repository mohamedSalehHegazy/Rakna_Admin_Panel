@extends('layouts.admin')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Notifications</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Notifications</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
  <div class="container-fluid ">
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
    <div class="table-responsive">
    <table class="table  table-bordered table-striped text-center">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Time</th>
          <th scope="col">Details</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @if(count($notifyNo)==0)
          <tr>
          <td> No notifications Available</td>
          </tr>
        @else
          @foreach($notifyNo as $notification)
            <tr>
            <td>{{$notification->type}}</td>
            <td>{{$notification->time}}</td>
            <td>{{$notification->details}}</td>
            
            <td >
            <ul class="list-inline">
            <li class="list-inline-item">
              <!-- Read Button --> 
              <a href="{{url('status2/'.$notification->notifyno.'/'.$notification->status)}}" class="btn btn-warning mb-2 mb-md-0">
                  @if($notification->status == 0) 
                  <i class="far fa-eye-slash"></i>
                  @else 
                  <i class="far fa-eye"></i>
                  @endif
              </a>
            </li>
            <li class="list-inline-item">
            <!-- Delete Button -->
            <form method="post" action="{{'notifications/'.$notification->notifyno}}">
                  {{csrf_field()}}
                  @method('delete')
                  <button type="submit" class="btn btn-danger "><i class="fas fa-trash"></i></button>
            </form>   
            </li>
            </td>     
            </tr>
          @endforeach
        @endif
      </tbody>
    </table> 
    </div>
  </div>
</section>    

@endsection