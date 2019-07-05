<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trains_schedule;
use App\Trains_detail;
use App\Station;
use App\User;
use App\Trains;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Alert;
use DB;
class TrainsscheduleController extends Controller
{
     //
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
        $datas = Trains_schedule::get();
        return view('trains_schedule.index', compact('datas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function create()
    {
        if(Auth::user()->level == 'OPERATOR') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }
        $trains_schedule=Trains_schedule::get();
        $station= Station::get();
        $trains = Trains::get();
        $trains_detail=Trains_detail::get();
        return view('trains_schedule.create', compact('users','trains','station','trains_detail','trains_schedule'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = Trains_schedule::where('id',$request->input('id'))->count();

        $this->validate($request, [
            'trains_detail_id' => 'required',

        ]);

        $trains_detail = Trains_schedule::create($request->all());

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('trains_schedule.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function edit($id)
    {   
        $data = Trains_schedule::findOrFail($id);
        $users = User::get();
        return view('trains_schedule.edit', compact('data', 'users'));
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
        Trains_schedule::find($id)->update($request->all());

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->to('trains_schedule');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Trains_schedule::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('trains_schedule.index');
    }
}
