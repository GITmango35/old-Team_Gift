<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class returnHome extends Controller
{
    public function home() { 
        
        return view('profile'); 
       } 
}
