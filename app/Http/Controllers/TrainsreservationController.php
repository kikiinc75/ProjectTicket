<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trains_reservation;
use App\Trains_schedule;
use App\Trains_detail;
use App\Station;
use App\User;
use App\Customer;
use App\Trains;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Alert;
use DB;
class TrainsreservationController extends Controller
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
        $datas = Trains_reservation::get();
        return view('trains_reservation.index', compact('datas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function create()
    {
        $trains_schedule=Trains_schedule::get();
        $station= Station::get();
        $trains = Trains::get();
        $trains_detail=Trains_detail::get();
        $trains_reservation=Trains_reservation::get();
        $customer=Customer::get();
        return view('trains_reservation.create', compact('users','trains','station','trains_detail','trains_schedule','trains_reservation','customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = Trains_reservation::where('id',$request->input('id'))->count();

        $this->validate($request, [
            'trains_class_seat' => 'required',
            'user_id'=>'required',
            'customer_id'=>'required',
            'trains_schedule_id' => 'required',
            
        ]);
        $trains_reservation = Trains_reservation::create($request->all());
        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('trains_reservation.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function edit($id)
    {   
        $data = Trains_reservation::findOrFail($id);
        $users = User::get();
        return view('trains_reservation.edit', compact('data', 'users'));
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
        Trains_reservation::find($id)->update($request->all());

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->to('trains_reservation');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Trains_reservation::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('trains_reservation.index');
    }
}
