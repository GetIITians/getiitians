<?php

namespace App\Repositories;

use App\User;
use App\Topic;
use App\Student;
use App\Teacher;
use App\Http\Requests;
use Illuminate\Http\Request;

class TopicRepository
{
	/**
	* Array of a teacher's topics.
	*
	* @var Array
	*/
	public $topics = [];

	/**
	 * Return the Teacher topics.
	 *
	 * @param  User $user
	 * @return Array
	 */
	public function classSubjectTopic(User $user)
	{
		foreach ($user->deriveable->topics as $topic) {
			$this->topics[$topic->subject->grade->name][$topic->subject->name][] = $topic->name;
		}

		return $this->topics;
	}

	/**
	 * Update the Teacher topics.
	 *
	 * @param  Illuminate\Http\Request $request
	 * @return Array
	 */
	public function updateTopics(Request $request)
	{
		if($request->has('subject'))
		{
			foreach ($request->input('subject') as $grade => $topics) {
				foreach ($topics as $key => $id) {
					$this->topics[$id] = ['fees' => $request->input('price')[$grade]];
				}
			}
		}

		return $this->topics;
	}

}