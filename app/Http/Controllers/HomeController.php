<?php

namespace App\Http\Controllers;
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

       return view('home',compact('customer'));
    }
}
