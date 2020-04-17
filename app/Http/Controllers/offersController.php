<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use DB;

class offersController extends Controller
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
        $offer = DB::table('offers')->simplePaginate(4);
        return view('pages.offers.offers',['offer'=>$offer,'messages'=>$messages,'notifyNum'=>$notifyNum]);
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
        return view('pages.offers.addOffer',['messages'=>$messages,'notifyNum'=>$notifyNum]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request)
        {
            $request->validate([
                'Title'=>'required',
                'Details'=>'required',
                'Start_Date'=>'required|date',
                'End_Date'=>'required|date|after_or_equal:Start_Date',
            ]);
            $data=$request->except(['_token']);
            DB::table('offers')->insert($data);
            return redirect('/offers')->with('succeess','inserted');

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
            $offer = DB::select('select * from offers where Offer_No = ?',[$id]);
            return view('pages.offers.offer',['offer'=>$offer[0],'messages'=>$messages,'notifyNum'=>$notifyNum]);
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
            $offer = DB::select('select * from offers where Offer_No = ?',[$id]);
            return view('pages.offers.addOffer',['offer'=>$offer[0],'messages'=>$messages,'notifyNum'=>$notifyNum]);
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

            $data=$request->except(['_token','_method']);
            DB::table('offers')->where('Offer_No', '=', $id)->update($data);
            return redirect('/offers')->with('succeess','inserted');

        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            $offer = DB::delete('delete from offers where Offer_No = ?',[$id]);
            return redirect('/offers');
        }
}