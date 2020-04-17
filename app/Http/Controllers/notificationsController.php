<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class notificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = DB::select('select * from messages');
        $notifyNum=DB::select('SELECT * FROM notifications where status=0');
        $notifyNo = DB::select('select * from notifications');
        return view("pages.notifications.allnotifications",compact('notifyNo','messages','notifyNum'));

    }

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
        $notifications=DB::delete('delete from notifications where notifyno = ?',[$id]);
        return redirect('notifications');
    }




    public function editStatus($id, $st){
        // return 'id'. $id . ' st '. $st;
        DB::update('update notifications set status=? where notifyno =?',
        [!$st,$id]);
        return back();
    }
}
