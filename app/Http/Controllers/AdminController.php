<?php

use App\Listing;
namespace App\Http\Controllers;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
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
        //DB::table('listings')->delete();

        $listings = DB::table('listings')->get();
        return view('admin/index', ['listings'=>$listings]);
    }
    public function getNew(Request $request)
    {
        $listing_types = DB::table('listing_types')->get();
        $operation = !empty($request->old('operation'))?$request->old('operation'):'sale';
        $listing_type = !empty($request->old('listing_type'))?$request->old('listing_type'):1;
        $location = !empty($request->old('location'))?$request->old('location'):"{lat:-34.6550036,lng:-58.6784542}";
        return view('admin/new', ['operation' => $operation,'listing_type_selected' => $listing_type, 'listing_types'=>$listing_types,'location'=>$location]);
    }

    public function getEdit(Request $request, $id)
    {
        $listing = \App\Listing::find($id);
        if (empty($listing)){
            return redirect('admin/index');
        }
        $listing_types = DB::table('listing_types')->get();
        return view('admin/edit', ['listing' => $listing, 'listing_types'=>$listing_types]);
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
        $listing->type = $request->type;
        $listing->price = $request->price;
        $listing->location = $request->location;
        $listing->save();

        return redirect('admin/index');

    }
}
