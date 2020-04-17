@extends('layouts.admin')

@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Messages</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Messages</li>
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
              <th>Name</th>
              <th>Time</th>
              <th>Message</th>
              <th>Action</th>
          </tr>
          @if(count($ownerMessage)==0)
          <tr>
          <td> No Messages Available</td>
          </tr>
          @else
          @foreach($ownerMessage as $message)
          <tr>
            <td>{{$message->message_Id}}</td>
            <td>{{$message->Name}}</td>
            <td>{{$message->sendTime}}</td>
            <td>{{$message->messageBody}}</td>
            <td>
              <!-- Reply Button --> 
              <form method="get" class="d-inline-block mb-2 mb-md-0" action="{{url('messages/'.$message->message_Id.'/edit')}}">
                {{csrf_field()}}
                <!-- @method('get') -->
                <button type="submit" class="btn btn-warning">Reply</button>
              </form>
              <!-- Delete Button -->
              <form method="post"class="d-inline-block" action="{{'messages/'.$message->message_Id}}">
                {{csrf_field()}}
                @method('delete')
                <button type="submit" class="btn btn-danger ">Delete</button>
              </form> 
          </td>
        </tr>
        @endforeach
      @endif
      </table>
    </div>
  </div>
</section>

@endsection