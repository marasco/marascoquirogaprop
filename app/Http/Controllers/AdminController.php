<?php

namespace App\Http\Controllers;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Listing;
use Auth;

class AdminController extends Controller
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
    public function getIndex()
    {
        $listings = DB::table('listings')->get();
        return view('admin/index', ['listings'=>$listings]);
    }
    public function getNew(Request $request)
    {
        $operation = !empty($request->old('operation'))?$request->old('operation'):'sale';
        return view('admin/new', ['operation' => $operation]);
    }
    public function postNew(Request $request)
    {
         

         $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'short_desc' => 'required|max:255',
            'location' => 'required|max:255',
        ]);

        if ($validator->fails()) {
             return redirect('admin/new')
                        ->withErrors($validator)
                        ->withInput();

        }

        $listing = new Listing;
        $listing->title = $request->title;
        $listing->short_desc = $request->short_desc;
        $listing->long_desc = $request->long_desc;
        $listing->price = $request->price;
        $listing->location = $request->location;
        $listing->save();

        return view('admin.index');


    }
}
