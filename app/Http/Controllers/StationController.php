<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Station;
use App\User;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Alert;
use DB;


class StationController extends Controller
{
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

        $datas = Station::get();
        return view('station.index', compact('datas'));
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
        return view('station.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = Station::where('code',$request->input('code'))->count();

        if($count>0){
            Session::flash('message', 'Already exist!');
            Session::flash('message_type', 'danger');
            return redirect()->to('station');
        }

        $this->validate($request, [
            'code' => 'required|string|max:255',
            'city' => 'required|string|max:100'
        ]);

        Station::create($request->all());

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('station.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {   
       
 

        $data = Station::findOrFail($id);
        $users = User::get();
        return view('station.edit', compact('data', 'users'));
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
        Station::find($id)->update($request->all());

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->to('station');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function destroy($id)
    {
        Station::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('station.index');
    }
}
