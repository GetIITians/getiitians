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
        $dataAddress = env('TEACHING_LINK', 'http://dev.getiitians.com/');
        $teachers = json_decode(file_get_contents($dataAddress.'narayan'), true);
        //var_dump($teachers);
        return view('frontend.teachers', ['teachers' => $teachers, 'imglink' => $dataAddress, 'page' => 'teachers']);
    }
}
