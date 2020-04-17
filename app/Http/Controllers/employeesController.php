<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use DB;

class employeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifyNum=DB::select('SELECT * FROM notifications where status=0');
        $messages = DB::select('select * from messages');

        //$employee=DB::select('SELECT * FROM  viewemployeeparking');
        $employee = DB::table('viewemployeeparking')->simplePaginate(4);
        return view('pages.employees.employees',['employee'=>$employee,'messages'=>$messages,'notifyNum'=>$notifyNum]);
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
        $parkingName= DB::select('select Parking_Name,Parking_Id from parking');

        return view('pages.employees.addEmployee',['parkingName'=>$parkingName,'messages'=>$messages,'notifyNum'=>$notifyNum]);
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
        $request->validate([
            'employeename'=>'required',
            'employeephone'=>'required',
        ]);

        $data=$request->except(['_token']);
        DB::table('employee')->insert($data);

        return redirect('/employees')->with('succeess','inserted');
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
        $employee=DB::select('SELECT * FROM  viewemployeeparking where employeeid = ?',[$id]);
        return view('pages.employees.employee',['employee'=>$employee[0],'messages'=>$messages,'notifyNum'=>$notifyNum]);
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
        $parkingName= DB::select('select Parking_Name,Parking_Id from parking');
        $employee = DB::select('select * from viewemployeeparking where employeeid = ?',[$id]);
        return view('pages.employees.addEmployee',['employee'=>$employee[0],'parkingName'=>$parkingName,'messages'=>$messages,'notifyNum'=>$notifyNum]);
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
        DB::table('employee')->where('employeeid', '=', $id)->update($data);

        return redirect('/employees')->with('succeess','inserted');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = DB::delete('delete from employee where employeeid = ?',[$id]);
        return redirect('/employees');
    }


/*status*/ 

    public function editStatus($id, $st){
        // return 'id'. $id . ' st '. $st;
        DB::update('update employee set status=? where employeeid =?',
        [!$st,$id]);
        return back();
    }

}
