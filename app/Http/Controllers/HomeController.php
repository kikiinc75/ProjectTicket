<?php

namespace App\Http\Controllers;
use App\Trains_schedule;
use App\Planes_schedule;
use App\Planes_reservation;
use App\Trains_reservation;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Customer;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::get();
        $trains_schedule = Trains_schedule::get();
        $planes_schedule = Planes_schedule::get();
        $planes_reservation=Planes_reservation::get();
        $trains_reservation=Trains_reservation::get();
       return view('home',compact('customer','trains_schedule','planes_schedule','trains_reservation','planes_reservation'));
    }
}
