<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mailers\AppMailer;

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

    public function postMessage(Request $request, AppMailer $mailer)
    {
        $mailer->sendMessageToTeacher($request);
        return response()->json(['message' => "Your message has been sent to ".$request->input('recipient')]);
    }

    public function postEnquiry(Request $request, AppMailer $mailer)
    {
        $mailer->sendEnquiryToAdmin($request);
        return response()->json(['message' => "Your enquiry has been successfully submitted."]);
    }

    public function postContact(Request $request, AppMailer $mailer)
    {
        $mailer->sendContactToAdmin($request);
        return response()->json(['message' => "Your enquiry has been successfully submitted."]);
    }

    public function postCall(Request $request, AppMailer $mailer)
    {
        $mailer->sendCallToTeacher($request);
        return response()->json(['message' => "Your enquiry has been successfully submitted."]);
    }

}
