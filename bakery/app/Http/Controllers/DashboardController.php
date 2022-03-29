<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DashboardController extends Controller
{

   

    public function index()
    {
        if(\Auth::user()->type=="baker"){
            return redirect('sheets');
        }
        else{
              $data['resturants'] = DB::table('resturants')->orderBy('id','DESC')->take(10)->get();
              $data['bakers'] = DB::table('users')->orderBy('id','DESC')->take(10)->get();
              return view('dashboard',$data);
           }
    }
}
