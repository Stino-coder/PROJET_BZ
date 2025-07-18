<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function _construct()
    {
        $this->middleware('auth')->except('bar');
    }
   public function admin(){
    $user= auth()->user();
    return view('mes_profiles.admin', compact('user'));
   }
   
}
