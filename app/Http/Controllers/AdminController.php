<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        DB::table('users')->insert([
            ['name'=>'Fran', 'email' => 'fran@marasco.com', 'password' => 'fran21']
        ]);
        */
        return view('admin/index');
    }
}
