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
        Mail::send(
                'emails.enquiry.message',
                ['teacher' => $request->input('recipient'), 'content' => $request->input('message')],
                function ($message) {
                    $message->from('getiitians@gmail.com', 'getIITians');
                    $message->to('narayanwaraich@gmail.com')->subject('Student Enquiry for a Teacher');
                });
        return response()->json(['message' => "Your message has been sent to ".$request->input('recipient')]);
    }

    /*
    public function getMessage(Request $request)
    {
        Mail::send(
                'emails.enquiry.message',
                ['teacher' => $request->input('recipient'), 'content' => $request->input('message')],
                function ($message) {
                    $message->from('getiitians@gmail.com', 'getIITians');
                    $message->to('narayanwaraich@gmail.com')->subject('Student Enquiry for a Teacher');
                });
    }
    */

    public function postEnquiry(Request $request)
    {
        Mail::send(
                'emails.enquiry.enquiry',
                [
                    'class' => $request->input('class'),
                    'subject' => $request->input('subject'),
                    'topic' => $request->input('topic'),
                    'enquiry' => $request->input('enquiry'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone')
                ],
                function ($message) {
                    $message->from('getiitians@gmail.com', 'getIITians');
                    $message->to('narayanwaraich@gmail.com')->subject('Student Enquiry');
                });
        return response()->json(['message' => "Your enquiry has been successfully submitted."]);
    }

    /*
    public function getEnquiry(Request $request)
    {
        Mail::send(
                'emails.enquiry.message',
                ['teacher' => $request->input('recipient'), 'content' => $request->input('message')],
                function ($message) {
                    $message->from('getiitians@gmail.com', 'getIITians');
                    $message->to('narayanwaraich@gmail.com')->subject('Student Enquiry for a Teacher');
                });
    }
    */
}