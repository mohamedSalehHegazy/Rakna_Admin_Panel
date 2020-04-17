@php
    $flag = 0;
    if(isset($offer)) $flag=1;
@endphp
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
        <div class="container-fluid">
            @if (Session::has('success'))
                {{Session::get('success')}}
                @php
                    Session::forget('success');
                @endphp
            @endif
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                        <li>{{$err}}</li>
                    @endforeach
                </div>
            @endif
            
            <form method="POST"  class="w-75 mx-auto mt-3 mt-md-5 pb-3" action="{{$flag? url('offers/'.$offer->Offer_No):url('offers')}}">
                @if($flag)
                    @method('put')
                @endif
                {{csrf_field()}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Offer Title</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="Title" value="{{ $flag ? $offer->Title : ''}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Offer Details</label>
                        <div class="col-sm-10">
                            <input type="tel" class="form-control" value="{{ $flag ? $offer->Details : ''}}" name="Details">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Start_Date</label>
                        <div class="col-sm-10">
                            <input type="{{$flag ? 'text' : 'datetime-local'}}" class="form-control" value="{{ $flag ? $offer->Start_Date : ''}}" name="Start_Date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">End_Date</label>
                        <div class="col-sm-10">
                            <input type="{{$flag ? 'text' : 'datetime-local'}}" class="form-control" value="{{ $flag ? $offer->End_Date : ''}}" name="End_Date" >
                        </div>
                    </div>
                    <div class="form-group row mt-md-5">
                        <div class="col-sm-10 offset-md-2">
                         <button type="submit" class="btn btn-primary btn-block">{{$flag ? 'update' : 'Add'}}</button>
                        </div>
                    </div>
            </form>
        </div>
    </section>
@endsection