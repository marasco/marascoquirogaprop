<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use DB;

class ApiController extends Controller
{
 
    public function __construct()
    {
       

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSendMail()
    {
        $data = array(
            'name' => 'name',
            'email' => 'email',
            'phone' => 'phone',
            'message' => 'hola',
            );
        Mail::send('emails.contact',  ['data'=>$data], function ($message) {
            $from = 'no-responder@marascoquirogaprop.com.ar';
            $message->from($from);
            $receiver = 'francisco.marasco@gmail.com';
            $message->to($receiver, 'Contacto Web')->subject('Contacto Web');
        });

        $result = true;

        return response()->json(['result' => $result], 200);
    }
 
    public function getIndex()
    {
        return response()->json(['test' => []], 200);
    }

}
