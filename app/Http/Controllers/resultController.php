<?php

namespace App\Http\Controllers;

use Request;
use App\Item;
use DB;
use Excel;
use Illuminate\Support\Facades\Auth;

class resultController extends Controller
{

    public function importExcel()
    {
        try {
            if (Request::hasFile('import_file')) {
                $path = Request::file('import_file')->getRealPath();
                $data = Excel::load($path, function ($reader) {
                })->get();
                if (!empty($data) && $data->count()) {
                    foreach ($data as $key => $value) {
                        $insert[] = [
                            'name' => $value->name,
                            'nric' => $value->nric,
                            'subject' => $value->subject,
                            'marks' => $value->marks,
                            'grade' => $value->grade,
                            'pass' => $value->pass
                        ];
                    }
                    if (!empty($insert)) {
                        DB::table('student_result')->insert($insert);
                        return redirect()->back()->with('alert', 'File uploaded.');
                    }
                }
            }
        } catch (\Exception $exception) {
            return $exception;
        }
    }



    public function viewResult()
    {
        if (Auth::user()->usertype == 'parent') {
            $name = 'gary';
            $student = DB::select('select * from student_result where name=?', [$name] );
            return view('viewResult', ['student' => $student]);
        }
    }



}