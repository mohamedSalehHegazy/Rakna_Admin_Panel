<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class messagesController extends Controller
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
        $ownerMessage = DB::select('select * from owners_messages_view');
        return view('pages.messages.showMessages',['messages'=>$messages,'ownerMessage'=>$ownerMessage,'notifyNum'=>$notifyNum]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
        $notifyNum=DB::select('SELECT * FROM notifications where status=0');
        $message = DB::select('select * from messages where message_Id = ?',[$id]);
        $messages = DB::select('select * from messages');
        $ownerMessage = DB::select('select * from owners_messages_view where message_Id = ?',[$id]);
        return view('pages.messages.messages',['message'=>$message[0],'notifyNum'=>$notifyNum,'messages'=>$messages,'ownerMessage'=>$ownerMessage[0]]);  
       
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
        
        $request->validate(
            [
            'adminReply'=>'required'
            ]);
        $data =$request->except(['_token']);
        $data['adminReply']=$request['adminReply'];
        DB::table('messages')
        ->where('message_Id', [$id])
        ->update(['adminReply' => $data['adminReply']]);
        return back()->with('success','Your Response Has Been Sent');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message=DB::delete('delete from messages where message_Id = ?',[$id]);
        return redirect('/messages');
    }
}
