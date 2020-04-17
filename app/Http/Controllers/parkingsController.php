<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class parkingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notifyNum=DB::select('SELECT * FROM notifications where status=0');
        $messages = DB::select('select * from messages');

        $cityName= DB::select('select City_Name,City_Id from city');

        return view('pages.parking.addParking',['cityName'=>$cityName,'messages'=>$messages,'notifyNum'=>$notifyNum]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $city = DB::select('select City_Id from city');
       
        $request->validate(
            [
            'Parking_Name'=>'required',    
            'Capacity'=>'required',
            'Slot_FeesPerHour'=>'required',
            'latitude'=>'required',
            'longitude'=>'required'
            ]);
        $data =$request->except(['_token']);
        DB::table('parking')->insert($data);
        return back()->with('success','Parking Has Been Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $notifyNum=DB::select('SELECT * FROM notifications where status=0');
        $messages = DB::select('select * from messages');
        $Parkings = DB::select('select * from viewcityparking where City_Id = ?',[$id]);

        return view('pages.parking.parkings',['Parkings'=>$Parkings,'messages'=>$messages,'notifyNum'=>$notifyNum]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        $notifyNum=DB::select('SELECT * FROM notifications where status=0');
        $messages = DB::select('select * from messages');
        $cityName= DB::select('select City_Name,City_Id from city');
        $parking = DB::select('select * from viewcityparking where Parking_Id = ?',[$id]);
    
        // dd($parking[0]);
        return view('pages.parking.addParking',['parking'=>$parking[0],'cityName'=>$cityName,'messages'=>$messages,'notifyNum'=>$notifyNum]);
        
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
        $data=$request->except(['_token','_method']);
        
        DB::table('parking')
            ->where('Parking_Id','=', $id)->update($data);
        return redirect('/parkings')->with('success','Parking Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $Park=DB::delete('delete from parking where Parking_Id = ?',[$id]);
        return back();
    }
}
