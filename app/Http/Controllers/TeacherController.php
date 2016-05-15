<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{

	/**
	 * Display the specified resource.
	 *
	 * @param  Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function search(Request $request)
	{

		$query = DB::table('teachers')
			->join('users', 'teachers.id', '=', 'users.id')
			->join('teacher_topic', 'teacher_topic.teacher_id', '=', 'teachers.id')
			->join('topics', 'topics.id', '=', 'teacher_topic.topic_id')
			->join('subjects', 'subjects.id', '=', 'topics.subject_id')
			->join('grades', 'grades.id', '=', 'subjects.grade_id')
			->join('qualifications', 'qualifications.teacher_id', '=', 'teachers.id')
			->select('users.id', 'users.name', 'users.picture', 'users.gender','qualifications.college', 'qualifications.degree', 'users.introduction', 'teachers.rating', 'teachers.rating_count', 'teachers.minfees')
			->where('teachers.display', '=', 1);
		if ($request->search !== null && $request->search !== ''){
			$query->where('users.name', 'LIKE', '%'.$request->search.'%')
				->orWhere('topics.name', 'LIKE', '%'.$request->search.'%')
				->orWhere('subjects.name', 'LIKE', '%'.$request->search.'%')
				->orWhere('grades.name', 'LIKE', '%'.$request->search.'%');
		}
		$teachers = $query->distinct()->groupBy('name')->get();
		$results = count($teachers);

		if($request->search && empty($teachers)) {
			$query = DB::table('teachers')
				->join('users', 'teachers.id', '=', 'users.id')
				->join('qualifications', 'qualifications.teacher_id', '=', 'teachers.id')
				->select('users.id', 'users.name', 'users.picture', 'users.gender','qualifications.college', 'qualifications.degree', 'users.introduction', 'teachers.rating', 'teachers.rating_count', 'teachers.minfees')
				->where('teachers.display', '=', 1);
			$teachers = $query->distinct()->groupBy('name')->get();
		}

		//var_dump($results);
		//var_dump($request->search);
		//echo "<pre>";print_r($teachers);echo "</pre>";

		$request->flashOnly('search');

		$topIds = [76,272,230,128,52,38,181,43];
		foreach ($teachers as $key => $teacher) {
			if (in_array($teacher->id,$topIds)) {
				unset($teachers[$key]);
				array_unshift($teachers, $teacher);
			}
		}


		//foreach ($teachers as $key => $teacher) { echo $teacher->picture."<br>";	}

		return view('frontend.teachers', ['teachers'  => $teachers, 'page' => 'teachers', 'results' => $results]);
	}

    public function postMessage(Request $request)
    {
        Mail::send(
                'emails.enquiry.message',
                ['teacher' => $request->input('recipient'), 'content' => $request->input('message')],
                function ($message) {
                    $message->from('narayanwaraich@gmail.com', 'getIITians');
                    $message->to('getiitians@gmail.com')->subject('Student Enquiry for a Teacher');
                });
        return response()->json(['message' => "Your message has been sent to ".$request->input('recipient')]);
    }

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
                    $message->from('narayanwaraich@gmail.com', 'getIITians');
                    $message->to('getiitians@gmail.com')->subject('Student Enquiry');
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
                    $message->from('narayanwaraich@gmail.com', 'getIITians');
                    $message->to('getiitians@gmail.com')->subject('Student Enquiry');
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
                    $message->from('narayanwaraich@gmail.com', 'getIITians');
                    $message->to('getiitians@gmail.com')->subject('Student Enquiry');
                });
        return response()->json(['message' => "Your enquiry has been successfully submitted."]);
        //return $request->input('email');
    }

}
