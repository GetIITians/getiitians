<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $dataAddress = "http://teaching.dev/";
        $teachers = json_decode(file_get_contents($dataAddress.'test'), true);
        //var_dump($teachers);
        return view('frontend.teachers', ['teachers' => $teachers, 'link' => $dataAddress]);
    }
}
