<?php

namespace App\Http\Controllers;

use App\Models\programme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    //hi there
    function  walkinview(){
        $programmes=programme::all();
        return view('create_walkin',['programmes'=>$programmes]);
    }

    function  walkin(Request $req){
//    $gt=$req->gtype;
//    $d=$req->date;
//    $ad=$req->adult;
//    $ch=$req->child;
//    $p=$req->pid;
//
//        $fn=$req->fname;
//        $ln=$req->lname;

        DB::table('guests')->insert([
            'fname' => $req->fname,
            'lname' =>$req->lname,
            'guest_id' => random_int(100, 1000)
        ]);


  DB::table('bookings')->insert([
      'excursion_date' => $req->date,
      'guest_type' =>$req->gtype,
      'adult' =>$req->adult,
      'child' =>$req->child,
      'programme_id' => $req->pid
  ]);



      return view('pay');
    }
}
