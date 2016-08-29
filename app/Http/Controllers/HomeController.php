<?php

namespace App\Http\Controllers;

use App\Listing;
use App\ListingImage;

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
                    $receiver = $data['email'];
                    $message->to($receiver, 'Contacto Web')->subject('Contacto Web');
                });
                return back()->withMessage('En la brevedad lo contactaremos. Gracias');
            }else{
                throw new \Exception("Error Processing Request", 1);
            }
        }else{
            throw new \Exception("Error Processing Request", 1);
        }
    } catch(\Exception $e){
        return back()->with('error-message', /*$e->getMessage().$e->getLine().*/'No se ha podido enviar su mail. Contactese al 4624-4850.');
    }

    }

    public function getIndex(Request $request)
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
    public function getView($id)
    {
        $listing = \App\Listing::find($id);
        if (empty($listing)){
            return redirect('/');
        }
        $listing_types = DB::table('listing_types')->get();
        $listing_images = DB::table('listing_images')->where('listing_id', $id)->get();
        return view('home/view', ['listing' => $listing, 'listing_types'=>$listing_types, 'listing_images'=>$listing_images]);
    }
}
