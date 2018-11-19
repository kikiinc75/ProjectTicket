<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Planes_schedule;
use App\Planes_detail;
use App\Airport;
use App\User;
use App\Planes;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Alert;
use DB;
class PlanesscheduleController extends Controller
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
        $datas = Planes_schedule::get();
        return view('planes_schedule.index', compact('datas'));
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
        $planes_schedule=Planes_schedule::get();
        $airport= Airport::get();
        $planes = Planes::get();
        $planes_detail=Planes_detail::get();
        return view('planes_schedule.create', compact('users','planes','airport','planes_detail','planes_schedule'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = Planes_schedule::where('planes_detail_id',$request->input('planes_detail_id'))->count();

        $this->validate($request, [
            'planes_detail_id' => 'required',

        ]);

        $planes_detail = Planes_schedule::create($request->all());

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('planes_schedule.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function edit($id)
    {   
        $data = Planes_schedule::findOrFail($id);
        $users = User::get();
        return view('planes_schedule.edit', compact('data', 'users'));
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
        Planes_schedule::find($id)->update($request->all());

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->to('planes_schedule');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Planes_schedule::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('planes_schedule.index');
    }
}
