<?php

namespace App\Http\Controllers;

use App\Listing;
use App\ListingImage;
use App\ListingType;

use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use DB;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
    }


    public function postIndex(Request $request){
        // email contact tool
        try {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if ( (!empty($data['name']) || !empty($data['message']) || !empty($data['phone'])) && !empty($data['email'])) {
                Mail::send('emails.contact',  ['data'=>$data], function ($message) use ($data) {
                    $from = 'no-responder@marascoquirogaprop.com.ar';
                    $message->from($from);
                    $receiver = 'info@marascoquirogaprop.com.ar'; //$data['email'];
                    $message->to($receiver, 'Contacto Web')->subject('Contacto Web');
                });
                return back()->withMessage('En la brevedad lo contactaremos. Gracias');
            }else{
                throw new \Exception("Error Processing Request", 1);
            }
        }else{
            throw new \Exception("Error Processing Request", 1);
        }
    }catch(\Swift_TransportException $e){
        return back()->with('error-message', $e->getMessage().'No se ha podido enviar su mail. Contactese al 4624-4850.');
    }

    }

    public function getIndex(Request $request)
    {
        $user = \Auth::user();
        $listing_types = DB::table('listing_types')->get();
        $listings = \App\Listing::all();
         
        return view('home/index',['user'=>$user, 'listing_types' => $listing_types, 'listings' => $listings]);
    }

    public function getSearch(Request $request)
    {
        $user = \Auth::user();
        $listing_types = DB::table('listing_types')->get();
        $data = $request->all();
        $listing_type_selected=0; 
        if (!empty($data)){
            $conditions = array();
            if (!empty($data['listing_type'])){
                $conditions[] = array('type','=',intval($data['listing_type']));
                $listing_type_selected = \App\ListingType::findOrFail(intval($data['listing_type']));
            }
            if ((!empty($data['sale']) && $data['sale']=='on') && (empty($data['rent']) || $data['rent']!='on')) 
                $conditions[] = array('operation','=','sale');
            if ((!empty($data['rent']) && $data['rent']=='on') && (empty($data['sale']) || $data['sale']!='on')) 
                $conditions[] = array('operation','=','rent');
            if (!empty(intval($data['price-a']))) {
                $conditions[] = array('price','>=', intval($data['price-a']));
            }
            if (!empty(intval($data['price-b']))) {
                $conditions[] = array('price','<=', intval($data['price-b']));
            }
            $listings = \App\Listing::where(
                    array_values($conditions)
                )->get();
        }else{
            $listings = \App\Listing::all();
        }
        return view('home/search',['listing_type_selected'=>$listing_type_selected, 'request'=>$data, 'page'=>'search','listing_types' => $listing_types,'user'=>$user,'listings' => $listings]);
    }
    
    public function getView($id)
    {
        $user = \Auth::user();
        $listing = \App\Listing::find($id);
        if (empty($listing)){
            return redirect('/');
        }
        $listing_types = DB::table('listing_types')->get();
        $listing_images = DB::table('listing_images')->where('listing_id', $id)->get();
        return view('home/view', ['page'=>'view', 'listing' => $listing, 'listing_types'=>$listing_types, 'user'=>$user, 'listing_images'=>$listing_images]);
    }
}
