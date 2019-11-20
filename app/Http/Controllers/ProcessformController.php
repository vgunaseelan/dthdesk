<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProcessformController extends Controller
{
    public function index()
    {
        // return view('FrontEnd.billing');
        $check = Session::get('FrontSession');
        if(isset($check))
        {
            print_r($check);
            // return view('FrontEnd.billing');
        }
        else
        {
            
                // return view('login_page');
                return view('users.login_register');
            
        }
    }



}
