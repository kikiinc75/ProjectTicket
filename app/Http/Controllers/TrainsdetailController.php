<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trains_detail;
use App\User;
use App\Trains;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Alert;
use DB;

class TrainsdetailController extends Controller
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
        $datas = Trains_detail::get();
        return view('Trains_detail.index', compact('datas'));
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
    	$trains = Trains::get();
        return view('Trains_detail.create', compact('users','trains'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = Trains_detail::where('code',$request->input('code'))->count();

        $this->validate($request, [
            'code' => 'required|string|max:255',
            'trains_id' => 'required',

        ]);

        $trains_detail = Trains_detail::create($request->all());

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('trains_detail.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function edit($id)
    {   
        $nama_trains=Trains_detail::where('trains_id')->with('Trains')->get();
        $data = Trains_detail::findOrFail($id);
        $users = User::get();
        return view('trains_detail.edit', compact('data', 'users'));
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
        trains_detail::find($id)->update($request->all());

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->to('trains_detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Trains_detail::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('trains.index');
    }
}
