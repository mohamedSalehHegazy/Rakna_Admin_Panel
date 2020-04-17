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
    <form method="POST"  class="w-75 mx-auto mt-5" action="{{url('messages/'.$ownerMessage->message_Id)}}">
        @method('put')
        {{csrf_field()}}
      <div class="form-group row">
          <label class="col-sm-2 col-form-label">Sender Name</label>
          <label class="col-sm-10 col-form-label text-muted">{{$ownerMessage->Name}}</label>
      </div>
      <div class="form-group row">
          <label class="col-sm-2 col-form-label">Send Time</label>
          <label class="col-sm-10 col-form-label text-muted">{{$ownerMessage->sendTime}}</label>
      </div>
      <div class="form-group row">
          <label class="col-sm-2 col-form-label">Message Body</label>
          <label class="col-sm-10 col-form-label text-muted">{{$ownerMessage->messageBody}}</label>
      </div>
      <div class="form-group row">
          <label class="col-sm-2 col-form-label">Admin Reply</label>
          <textarea class="col-sm-10 form-control" name="adminReply" rows="3"></textarea>
      </div>
      <div class="form-group row mt-5">
          <div class="col-sm-10 offset-md-2">
              <button type="submit" class="btn btn-primary btn-block">Reply</button>
          </div>
      </div>
    </form>
  </div>
</section>

@endsection