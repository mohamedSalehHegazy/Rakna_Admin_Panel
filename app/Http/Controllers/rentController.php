<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use DB;

class rentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifyNum=DB::select('SELECT * FROM notifications where status=0');
        $messages = DB::select('select * from messages');
        $rent = DB::table('viewrent')->simplePaginate(4);
        return view('pages.rent.rent',['rent'=>$rent,'messages'=>$messages,'notifyNum'=>$notifyNum]);
    }
    /*cars avilable*/ 

    // public function editStatus($id,$st){
    // //     $rent=DB::select('select * from viewticket where rentno=? and Date_From <= left(now() , 10) and Date_To >= left(now() , 10) and Time_From <= right(now() , 8) and Time_To > right(now() , 8)',[$id,$id])->groupBy('rentno');
    // //    dd($rent);
    //     // $rent = DB::select('SELECT rentalcarno FROM rent WHERE rentno=? and timeto >= CURRENT_TIME() and dateto >= CURRENT_DATE()',[$id]);
    //     $rent = DB::select('SELECT rentalcarno FROM rent WHERE timeto <= CURRENT_TIME() and dateto <= CURRENT_DATE()');
        
    //     //dd($rent);
    //     // $x=DB::select('SELECT `rentalcarno` FROM `rent` WHERE timeto>=now()');
    //     $carID = get_object_vars($rent[0]);
    //     //dd($carID);
    //      foreach($carID as $rentID)
    //       $rentID;
    //     // dd($x[0]);
    //     DB::update('update rentalcars set status=? where rentalcarno =?',[!$st,$rentID]);
    //     return back();
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
