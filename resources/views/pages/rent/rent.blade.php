
@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                <h1 class="m-0 text-dark">Rent Cars</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Rent</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid"> 
            <div class="table-responsive">
            <div>{{$rent->links()}}</div>
            <table class="table table-bordered table-striped text-center">
                <tr>
                    <th>Name</th>
                    <th>Parking Name</th>
                    <th>slot</th>
                    <th>CarNo</th>
                    <th>datefrom</th>
                    <th>dateto</th>
                    <th>timefrom</th>
                    <th>timeto</th>
                    <th>cartype</th>
                    <th>carcolor</th>
                    <th>carlicenseno</th>
                    <!-- <th>Action</th> -->
                </tr>
                @if (count($rent)==0)
                    <tr>
                        <td colspan="12">No Rental Cars</td>
                    </tr>
                @else
                    @foreach ($rent as $rent)
                        <tr>
                            <td>{{$rent->Name}}</td>
                            <td>{{$rent->Parking_Name}}</td>
                            <td>{{$rent->slot_code}}</td>
                            <td>{{$rent->rentalcarno}}</td>
                            <td>{{$rent->datefrom}}</td>
                            <td>{{$rent->dateto}}</td>
                            <td>{{$rent->timefrom}}</td>
                            <td>{{$rent->timeto}}</td>
                            <td>{{$rent->rcartype}}</td>
                            <td>{{$rent->rcarcolor}}</td>
                            <td>{{$rent->rcarlicenseno}}</td>
                            <!-- <td>
                                <a href="{{url('caravilale/'.$rent->rentalcarno.'/'.$rent->status)}}" 
                                    @if($rent->status == 0) 
                                        class="btn btn-success"> avilable
                                    @else 
                                        class="btn btn-danger">notAvil.
                                    @endif
                                </a>
                            </td> -->
                        </tr>
                    @endforeach
                @endif
            </table>
            </div>
        </div>
    </section>
@endsection