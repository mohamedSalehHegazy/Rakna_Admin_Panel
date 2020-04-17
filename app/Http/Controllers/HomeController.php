<?php

namespace App\Http\Controllers;
use App\Charts\SampleChart;
use Illuminate\Http\Request;
use Charts;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $messages = DB::select('select * from messages');
        $notifyNum = DB::select('select * from notifications where status=0');
        $offerChart=DB::select('select * from offers');
        $rentalCarNo=DB::select('select * from rentalcars');
        $carOwnerChart=DB::select('SELECT * FROM `car owner`');
        $empChart=DB::select('select * from employee');
        $ticket=DB::select('select * from ticket');
        $rent=DB::select('select * from rent');
        $delivery=DB::select('select * from delivery');
   
        return view("home", compact('offerChart','carOwnerChart','empChart','notifyNum','messages','rentalCarNo','ticket','rent','delivery'));

    }
}
