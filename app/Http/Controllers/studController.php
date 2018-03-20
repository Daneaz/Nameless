<?php

namespace App\Http\Controllers;
use Twilio;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class studController extends Controller
{

      public function showStudent()
    {
      if (Auth::user()->usertype == 'teacher') {
         $students = DB::select('select * from students');
           return view('publishStud', ['students' => $students]);
       }
    }

      public function msg() {
            $names=$_GET['names'];
            Twilio::message("+6597985397", "Your child is present today.");
            // foreach($names as $name) {
            //   Twilio::message("+6596588614", "Your child is present today.");
            // }
      }


}
