<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
   
    public function index()
    {
        /* $role = Auth::user()->role;
        $checkrole = explode(',', $role);
        if (in_array('admin', $checkrole)) {
            return redirect('/dashboard');
        } else {
            
        } */
         return view('home');
       /*  return view('index'); */
/*        return back();
 */    }
}
