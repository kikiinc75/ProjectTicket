<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Planes_reservation;
use App\Planes_schedule;
use App\Planes_detail;
use App\Airport;
use App\User;
use App\Customer;
use App\Planes;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Alert;
use DB;
class PlanesreservationController extends Controller
{
    ////
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $datas = Planes_reservation::get();
        return view('planes_reservation.index', compact('datas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function create()
    {
        $planes_schedule=Planes_schedule::get();
        $airport= Airport::get();
        $planes = Planes::get();
        $planes_detail=Planes_detail::get();
        $planes_reservation=Planes_reservation::get();
        $customer=Customer::get();
        return view('planes_reservation.create', compact('users','planes','airport','planes_detail','planes_schedule','planes_reservation','customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = Planes_reservation::where('id',$request->input('id'))->count();

        $this->validate($request, [
            'planes_class_seat' => 'required',
            'user_id'=>'required',
            'customer_id'=>'required',
            'planes_schedule_id' => 'required',
            
        ]);
        $planes_reservation = Planes_reservation::create($request->all());
        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('planes_reservation.index');

    }

    /** 
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function edit($id)
    {   
        $data = Planes_reservation::findOrFail($id);
        $users = User::get();
        return view('planes_reservation.edit', compact('data', 'users'));
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
        Planes_reservation::find($id)->update($request->all());

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->to('planes_reservation');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Planes_reservation::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('planes_reservation.index');
    }
}
