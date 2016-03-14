<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
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

    public function postEnquiry(Request $request)
    {
        Mail::send(
                'emails.enquiry.enquiry',
                [
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

    /**
     * Display the specified resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function postContact(Request $request)
    {
        Mail::send(
                'emails.contact',
                [
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'messageBody' => $request->input('message')
                ],
                function ($message) {
                    $message->from('getiitians@gmail.com', 'getIITians');
                    $message->to('narayanwaraich@gmail.com')->subject('Student Enquiry');
                });
        return response()->json(['message' => "Your enquiry has been successfully submitted."]);
        //return $request->input('email');
    }

    /**
     * Display the specified resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function postCall(Request $request)
    {
        Mail::send(
                'emails.enquiry.call',
                [
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                ],
                function ($message) {
                    $message->from('getiitians@gmail.com', 'getIITians');
                    $message->to('narayanwaraich@gmail.com')->subject('Student Enquiry');
                });
        return response()->json(['message' => "Your enquiry has been successfully submitted."]);
        //return $request->input('email');
    }

}