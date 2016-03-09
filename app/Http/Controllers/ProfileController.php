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

		/*
		$users = DB::table('users')
			->join('teachers', 'users.id', '=', 'teachers.id')
			->select('users.*', 'teachers.*')
			->get();
		*/
		//var_dump($users);
		//var_dump(User::find(76));
		//echo "<pre>";print_r(Teacher::find(76)->users);echo "</pre>";
		//var_dump(User::find(76)->deriveable);
		//var_dump(Teacher::find(76)->users[0]->name);
		//var_dump($request->search);
		//var_dump(Teacher::find(76)->users->first());
		//var_dump(Teacher::with('users')->get());
		//var_dump(Teacher::all());
		$request->flashOnly('search');
		$teachers = Teacher::with('users','qualifications')->where('display', '=', 1)->get();

		$topIds = [76,272,230,128,52,38,181,43];
		foreach ($teachers as $key => $teacher) {
			if (in_array($teacher->id,$topIds)) {
				unset($teachers[$key]);
				$teachers->prepend($teacher);
			}
			if ($teacher->users->first()->picture == '') {
				if (strtolower($teacher->users->first()->gender) == 'f') {
					$teacher->users->first()->picture = "img/female.png";
				} else {
					$teacher->users->first()->picture = "img/male.png";
				}
			} else {
				$teacher->users->first()->picture = env('TEACHING_LINK').$teacher->users->first()->picture;
			}
		}

		//foreach ($teachers as $key => $teacher) { echo $teacher->users->first()->picture."<br>";	}

		//return view('frontend.tutors', ['teachers'  => $teachers, 'page' => 'teachers']);
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
	public function schedule($id)
	{
		$teacher = Teacher::with('users','timeslots')->where('display', '=', 1)->find($id);

		//var_dump($topics);
		//echo "<pre>";print_r($teacher->toArray());echo "</pre>";
		return view('frontend.profile.schedule', ['page' => 'profile', 'teacher' => $teacher]);
	}

}