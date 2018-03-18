<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class formController extends Controller
{

   public function signForm(Request $request){
      $user_id = $request->input('user_id');
      $consentForm_id = $request->input('form_id');
      DB::table('signform')->insert(
          ['user_id' => $user_id, 'consentForm_id'=> $consentForm_id, 'boolean'=>true]
      );
      return back();
   }

   public function showForms()
{
    if (Auth::user()->usertype == 'parent' ) {
      $userid = Auth::user()->id;
      $forms = DB::select('select * from consentform where consentForm_id not in (select consentForm_id from signform where ? = user_id)', [$userid]);
      return view('consentForm', ['forms' => $forms]);
    } else if (Auth::user()->usertype == 'admin') {
          $forms = DB::select('select * from consentform');
          return view('adminconsentForm',['forms'=>$forms]);
    } else if (Auth::user()->usertype == 'teacher') {
      $forms = DB::select('select * from consentform');
      $view = null;
        return view('teacherconsentForm', ['forms' => $forms]);
    } else {
      echo "Wrong user type, contact your administrator.";
    }
}

public function processForm(Request $request){
  if ($request->input('action') == 'create') {
    $title = $request->input('title');
    $form = $request->input('content');
    $admin_id = Auth::user()->id;
    DB::table('consentform')->insert(
        ['title'=>$title, 'form' => $form, 'admin_id'=> $admin_id]
    );
    return back();
  } else if ($request->input('action') == 'delete') {
      $id = $request->input('form_id');
      DB::delete('delete from consentform where consentForm_id=?' , [$id]);
      DB::delete('delete from signform where consentForm_id=?' , [$id]);
      return back();
  }

}

public function showNames(Request $request){
  if (Auth::check()) {
    $form_id=$_GET['form_id'];
    $array = explode('-', $form_id);
    if ($array[0]=='signed'){
      $names = DB::select('select name from signform s, users u where s.consentForm_id =? and s.user_id =u.id and u.usertype=? ' , [$array[1], 'parent']);
       return response()->json($names);
    } else {
      $names = DB::select('select name from users where usertype=? and id not in (select user_id from signform where consentForm_id=?)' , ['parent', $array[1]]);
       return response()->json($names);
    }
  } else {
    return view('auth/login');
  }
}

public function showModify(Request $request){
  $forms = DB::select('select * from consentform');
  return view('adminconsentForm',['forms'=>$forms]);
}

}
