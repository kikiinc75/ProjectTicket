<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trains;
use App\User;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Alert;
use DB;


class TrainsController extends Controller
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

        $datas = Trains::get();
        return view('Trains.index', compact('datas'));
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

        $users = User::WhereNotExists(function($query) {
                        $query->select(DB::raw(1))
                        ->from('trains')
                        ->whereRaw('trains.id = users.id');
                     })->get();
        return view('trains.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = Trains::where('name',$request->input('name'))->count();

        if($count>0){
            Session::flash('message', 'Already exist!');
            Session::flash('message_type', 'danger');
            return redirect()->to('trains');
        }

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'eco_seat_qty' => 'required|string|max:100'
        ]);

        Trains::create($request->all());

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('trains.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if((Auth::user()->level == 'OPERATOR') && (Auth::user()->id != $id)) {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = Trains::findOrFail($id);

        return view('trains.show', compact('data'));
    }

    public function edit($id)
    {   
       
 

        $data = Trains::findOrFail($id);
        $users = User::get();
        return view('trains.edit', compact('data', 'users'));
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
        trains::find($id)->update($request->all());

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->to('trains');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function destroy($id)
    {
        Trains::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('trains.index');
    }
}



