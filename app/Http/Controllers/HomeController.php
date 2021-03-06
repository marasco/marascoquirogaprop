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
                    return back()->with('error-message', 'En la brevedad lo contactaremos. Gracias');
                } else {
                    throw new \Exception("Error Processing Request", 1);
                }
            } else {
                throw new \Exception("Error Processing Request", 1);
            }
        } catch(\Swift_TransportException $e){
            error_log('error: '.$e->getMessage());
            return back()->with('error-message', $e->getMessage().'. No se ha podido enviar su mail. Contactese al 4624-4850.');
        } catch (\Exception $e){
            error_log('error: '.$e->getMessage());
            return back()->with('error-message', $e->getMessage().'Error. No se ha podido enviar su mail. Contactese al 4624-4850.');
        }

    }

    public function getIndex(Request $request)
    {
        $user = \Auth::user();
        $listing_types = DB::table('listing_types')->get();
        $cities = DB::table('cities')->get();
        $listings = \App\Listing::get()->sortByDesc('id')->take(36);
        $all_listings = \App\Listing::get()->sortByDesc('id')->take(200);
         
        return view('home/index',[
            'user' => $user, 
            'listing_types' => $listing_types, 
            'cities' => $cities, 
            'listings' => $listings,
            'all_listings' => $all_listings
            ]);
    }

    public function getSearch(Request $request)
    {
        $user = \Auth::user();
        $listing_types = DB::table('listing_types')->get();
        $cities = DB::table('cities')->get();
        $currencies = [
            'U$S',
            'AR$',
        ];
        $data = $request->all();
        $listing_type_selected=0;
        $currency_selected='U$S'; 
        $city_selected=0; 
        if (!empty($data)) {
            if (!empty($data['codigo'])){
                $item = \App\Listing::get()->where('property_code', '=', $data['codigo'])->first();
                if (!empty($item)){
                    return redirect('/propiedad/'.$data['codigo']);
                }
            }
            $conditions = array();
            if (!empty($data['listing_type'])){
                $conditions[] = array('type','=',intval($data['listing_type']));
                $listing_type_selected = \App\ListingType::findOrFail(intval($data['listing_type']));
            }
            if (!empty($data['currency'])){
                $conditions[] = array('currency','=',$data['currency']);
                $currency_selected = $data['currency'];
            }
            if (!empty($data['city_id'])){
                $conditions[] = array('type','=',intval($data['city_id']));
                $city_selected = \App\City::findOrFail(intval($data['city_id']));
            }
            if (!empty($data['operacion']) && $data['operacion'] == 'venta') {
                $conditions[] = array('operation','=','sale');
                $data['sale']='on';
            }
            if (!empty($data['operacion']) && $data['operacion'] == 'alquiler') {
                $conditions[] = array('operation','=','rent');
                $data['rent']='on';
            }
            if ((!empty($data['sale']) && $data['sale']=='on') && (empty($data['rent']) || $data['rent']!='on')) {
                $conditions[] = array('operation','=','sale');
            }
            if ((!empty($data['rent']) && $data['rent']=='on') && (empty($data['sale']) || $data['sale']!='on')) {
                $conditions[] = array('operation','=','rent');
            }

            if (!empty(intval(@$data['price-a']))) {
                $conditions[] = array('price','>=', intval($data['price-a']));
            }
            if (!empty(intval(@$data['price-b']))) {
                $conditions[] = array('price','<=', intval($data['price-b']));
            }
            $listings = \App\Listing::where(
                    array_values($conditions)
                )->get();
        }else{
            $listings = \App\Listing::all();
        } 
        return view('home/search',[
            'city_selected'=>$city_selected, 
            'listing_type_selected'=>$listing_type_selected, 
            'currency_selected'=>$currency_selected, 
            'request'=>$data, 
            'page'=>'search', 
            'listing_types' => $listing_types, 
            'cities' => $cities, 
            'currencies' => $currencies, 
            'user'=>$user, 
            'listings' => $listings
            ]);
    }
    
    public function getView($id)
    {
        $user = \Auth::user();
        $listing = \App\Listing::find($id);
        if (empty($listing)) {
            $listing = \App\Listing::get()->where('property_code', '=', $id)->first();
        }
        if (empty($listing)) {
            return redirect('/');
        }
        $listing_types = DB::table('listing_types')->get();
        $listing_images = DB::table('listing_images')->where('listing_id', $listing->id)->get();
        return view('home/view', ['page'=>'view', 'listing' => $listing, 'listing_types'=>$listing_types, 'user'=>$user, 'listing_images'=>$listing_images]);
    }
}
