<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Planes_detail;
use App\Airport;
use App\User;
use App\Planes;
use App\Planes_schedule;
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
        $airport= Airport::get();
    	$planes = Planes::get();
    	$planes_detail=Planes_detail::get();
        $planes_schedule=Planes_schedule::get();
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
        $count = Planes_schedule::where('code',$request->input('code'))->count();

        $this->validate($request, [
            'code' => 'required|string|max:255',
            'planes_id' => 'required',

        ]);

        $planes_detail = Planes_detail::create($request->all());

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('planes_detail.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function edit($id)
    {   
        $data = Planes_detail::findOrFail($id);
        $users = User::get();
        return view('planes_detail.edit', compact('data', 'users'));
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
        Planes_detail::find($id)->update($request->all());

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->to('planes_detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Planes_detail::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('planes_detail.index');
    }
}
