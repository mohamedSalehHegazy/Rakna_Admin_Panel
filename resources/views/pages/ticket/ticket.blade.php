
@extends('layouts.admin')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tickets</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Tickets</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="d-none d-md-block">{{$ticket->links()}}</div>
        <div class="table-responsive">
            <table class="table  table-bordered table-striped text-center">
                <tr>
                    <th>#</th>
                    <th>Car_Number</th>
                    <th>datefrom</th>
                    <th>dateto</th>
                    <th>timefrom</th>
                    <th>timeto</th>
                    <th>Reservation_Time</th>
                    <th>total</th>
                </tr>
                @if (count($ticket)==0)
                    <tr>
                        <td colspan="8">No Tickets</td>
                    </tr>
                @else
                    @foreach ($ticket as $ticket)
                        <tr>
                            <td>{{$ticket->ticket_id}}</td>
                            <td>{{$ticket->Car_Number}}</td>
                            <td>{{$ticket->Date_From}}</td>
                            <td>{{$ticket->Date_To}}</td>
                            <td>{{$ticket->Time_From}}</td>
                            <td>{{$ticket->Time_To}}</td>
                            <td>{{$ticket->Reservation_Time}}</td>
                            <td>{{$ticket->total}}</td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </section>

@endsection