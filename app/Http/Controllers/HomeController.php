<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /*  
        DB::table('users')->delete();
        DB::table('users')->insert([
            ['name'=>'Fran', 'email' => 'fran@marasco.com', 'password' => Hash::make('fran21'), 'created_at'=>gmdate('Y-m-d H:i:s')]
        ]);
        */
        $listing_types = DB::table('listing_types')->get();
        $listings = \App\Listing::all();
         
        return view('home/index',['listing_types' => $listing_types, 'listings' => $listings]);
    }
}
