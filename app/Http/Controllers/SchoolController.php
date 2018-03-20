<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\School;
use DB;
//use Twilio;
class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	$School = School::all();
	$cca =	DB::table('cca')->distinct()->select('cca_generic_name')->get()->pluck('cca_generic_name');// This is the name of the column you wish to search
	$Subjects = DB::table('subjects')->distinct()->select('subject_desc')->get()->pluck('subject_desc');
$cca->prepend('Please Select');
$Subjects->prepend('Please Select');
//Twilio::message("+6596588614", "Yes i did it");
	return view('School.index', ['School' => $School,'Subjects'=>$Subjects,'cca'=>$cca]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$column = 'schoolId'; // This is the name of the column you wish to search

       $School = School::where($column , '=', $id)->first();

      return view('School.show', array('School' => $School));
    }
 public function find(Request $request)
    {

		$number = (int)$request->subject;
		$number1 = (int)$request->cca;


		$column = 'sj.subject_desc';
$column1 = 'c.cca_generic_name';
$cca =	DB::table('cca')->distinct()->select('cca_generic_name')->get()->pluck('cca_generic_name');// This is the name of the column you wish to search
$Subjects = DB::table('subjects')->distinct()->select('subject_desc')->get()->pluck('subject_desc');
		$sub = "";
		$ca ="";
		if($number !=0){
		$sub =$Subjects[$number-1];
		}
		if($number1 !=0){
		$ca =$cca[$number1-1];
		}

$cca->prepend('Please Select');
$Subjects->prepend('Please Select');
if($number !=0 && $number1 !=0){
		$School = DB::table('schools as s')->join('subjects as sj', 's.school_name', '=' , 'sj.school_name')->join('cca as c', 's.school_name', '=' , 'c.school_name')->select('s.school_name','s.address','s.telephone_no')->where($column, 'like', '%'.$sub.'%')->Where($column1, 'like', '%'.$ca.'%')->Where("mainlevel_code", 'like', '%'.$request->Level.'%')->distinct()
                ->get()->all();
}
elseif($number !=0){
	$School = DB::table('schools as s')->join('subjects as sj', 's.school_name', '=' , 'sj.school_name')->select('s.school_name','s.address','s.telephone_no')->where($column, 'like', '%'.$sub.'%')->Where("mainlevel_code", 'like', '%'.$request->Level.'%')->distinct()
                ->get()->all();
}
elseif($number1 !=0){
		$School = DB::table('schools as s')->join('cca as c', 's.school_name', '=' , 'c.school_name')->select('s.school_name','s.address','s.telephone_no')->where($column1, 'like', '%'.$ca.'%')->Where("mainlevel_code", 'like', '%'.$request->Level.'%')->distinct()
                ->get()->all();
}
else{
	$School = DB::table('schools as s')->select('s.school_name','s.address','s.telephone_no')->Where("mainlevel_code", 'like', '%'.$request->Level.'%')->get()->all();
}
      return view('School.index', array('School' => $School,'Subjects'=>$Subjects,'cca'=>$cca));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function showSchoolName(Request $request){
      //if (Auth::check()) {
        $school_id=$_GET['school_id'];
          $school = DB::select('select school_name from schools where schoolId =?' , [$school_id]);
           return response()->json($school);

    //  } else {
      //  return view('auth/login');
      //}
    }
}
