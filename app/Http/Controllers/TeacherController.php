<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
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

    public function postMessage(Request $request)
    {
        //return response()->json(['message' => $request->input('message')]);
        Mail::send(
                'emails.enquiry.message',
                ['teacher' => $request->input('recipient'), 'content' => $request->input('message')],
                function ($message) {
                    $message->from('narayansinghwaraich@gmail.com', 'getIITians');
                    $message->to('narayanwaraich@gmail.com');
                });
        //return "Email successfully sent.";
        return response()->json(['message' => "Email successfully sent."]);
    }
/*
    public function getMessage(Request $request)
    {
        Mail::send(
                'emails.enquiry.message',
                ['teacher' => $request->input('recipient'), 'content' => $request->input('message')],
                function ($message) {
                    $message->from('narayansinghwaraich@gmail.com', 'getIITians');
                    $message->to('narayanwaraich@gmail.com')->subject('Student Enquiry for a Teacher');
                });
    }
*/
}