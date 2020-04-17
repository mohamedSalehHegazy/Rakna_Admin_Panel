<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class citesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cites = DB::select('select * from city');
        $messages = DB::select('select * from messages');
        $notifyNum=DB::select('SELECT *FROM notifications where status=0');

        return view('pages.cities.cites',['cites'=>$cites,'messages'=>$messages,'notifyNum'=>$notifyNum]);
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
        return view('pages.cities.addCity',['messages'=>$messages,'notifyNum'=>$notifyNum]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $city = DB::select('select max(City_Id) from city');
        //$city = DB::select('select count(City_Id) from city');
        $request->validate(
            [
            'City_Name'=>'required|alpha-num|unique:city',
            'Description'=>'required',
            'image'=>'image|mimes:png,jpg,jpeg,svg|max:1024'
            ]);
        $newID = get_object_vars($city[0]);
        foreach($newID as $maxID)
        $maxID+=1;
        
        $cityId=DB::update('ALTER TABLE city AUTO_INCREMENT ='.$maxID);


        $imgName = $maxID.'.'.$request->image->extension();
        $request->image->move(public_path('img'),$imgName);
        $data =$request->except(['_token']);
        $data['image']=$imgName;
        $data['City_Id']=$cityId;
        DB::table('city')->insert($data);
        return redirect('/cites')->with('success','City Has Been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        
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
        $cites = DB::select('select * from city where City_Id = ?',[$id]);
        $messages = DB::select('select * from messages');
        return view('pages.cities.addCity',['city'=>$cites[0],'messages'=>$messages,'notifyNum'=>$notifyNum]);
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
        $city = DB::select('select * from city');
        // $request->validate(
        //     [
        //     'City_Name'=>'required|alpha-num|unique:city',
        //     'Description'=>'required',
        //     'image'=>'image|required|mimes:png,jpg,jpeg,svg|max:1024'
        //     ]);

        foreach($city as $imgID)  
             
        $imgName = $imgID->City_Id;
        $imgName = $imgName.'.'.$request->image->extension();
        $request->image->move(public_path('img'),$imgName);

        $data =$request->except(['_token']);
        $data['City_Name']=$request['City_Name'];
        $data['Description']=$request['Description'];
        $data['image']=$imgName;

        DB::table('city')
            ->where('City_Id', [$id])
            ->update(['City_Name' => $data['City_Name'],'Description' => $data['Description'],
            'image' => $data['image']]);
        return redirect('/cites')->with('success','City Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Cites=DB::delete('delete from city where City_Id = ?',[$id]);
        return redirect('/cites');
    }
}
