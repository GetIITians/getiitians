<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Gate;
use Auth;
use App\User;
use App\Teacher;
use App\Qualification;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{

	/**
	 * Display the specified resource.
	 *
	 * @param  Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request)
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
		if ($request->search !== null){
			$query->where('users.name', 'LIKE', '%'.$request->search.'%')
					->orWhere('topics.name', 'LIKE', '%'.$request->search.'%')
					->orWhere('subjects.name', 'LIKE', '%'.$request->search.'%')
					->orWhere('grades.name', 'LIKE', '%'.$request->search.'%');			
		}
		$teachers = $query->distinct()->groupBy('name')->get();
		$results = (empty($teachers)) ? FALSE : TRUE ;

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
			if ($teacher->picture == '') {
				if (strtolower($teacher->gender) == 'f') {
					$teacher->picture = "img/female.png";

				} else {
					$teacher->picture = "img/male.png";
				}
			} else {
				$teacher->picture = env('TEACHING_LINK').$teacher->picture;
			}
		}

		//foreach ($teachers as $key => $teacher) { echo $teacher->users->first()->picture."<br>";	}

		return view('frontend.teachers', ['teachers'  => $teachers, 'page' => 'teachers', 'results' => $results]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function profile($id)
	{
		$teacher = Teacher::with('users','qualifications','languages','topics')->where('display', '=', 1)->find($id);
		return view('frontend.profile.index', ['page' => 'profile', 'teacher' => $teacher]);
		//var_dump(Teacher::with('users','qualifications','languages','topics')->where('display', '=', 1)->find($id));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function topics($id)
	{
		$teacher = Teacher::with('users','topics')->where('display', '=', 1)->find($id);

		foreach ($teacher->topics as $topic) {
			$topics[$topic->subject->grade->name][$topic->subject->name][] = $topic->name;
		}
		//var_dump($topics);
		//echo "<pre>";print_r($teacher->toArray());echo "</pre>";
		return view('frontend.profile.topics', ['page' => 'profile', 'teacher' => $teacher, 'topics' => $topics]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function schedule($id,$month = null,$year = null)
	{
		$teacher = Teacher::with('users','timeslots')->where('display', '=', 1)->find($id);
		$Month = ($month === null) ? date("n") : (int)$month ;
		$Year = ($year === null) ? date("Y") : (int)$year ;
		//var_dump($Month);
		//var_dump($Year);
		return view('frontend.profile.schedule', ['page' => 'profile', 'teacher' => $teacher, 'month' => $Month, 'year' => $Year]);
	}

}