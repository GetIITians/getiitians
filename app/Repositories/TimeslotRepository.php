<?php

namespace App\Repositories;

use App\User;
use App\Timeslot;
use App\Teacher;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;

class TimeslotRepository
{
	/**
	* Array of a teacher's timeslots.
	*
	* @var Array
	*/
	protected $timeslots = [];

	/**
	* Date to add timeslots for
	*
	* @var Carbon\Carbon
	*/
	protected $date;

	/**
	 * Update the Teacher timeslots.
	 *
	 * @param  Illuminate\Http\Request $request
	 * @return void
	 */
	public function updateTimeslots(Request $request)
	{
		$teacher_id = 	$request->user->deriveable->id;
		$start 		=	Carbon::createFromFormat('|d/m/Y',$request->input('start'));
		$end 		=	Carbon::createFromFormat('|d/m/Y',$request->input('end'));
		$dbStart	=	$start->toDateString();
		$dbEnd		=	$end->addDay()->toDateString();
		$time 		=	$request->input('time');
		$span 		=	$end->diffInDays($start);

		if($request->has('time')){
			for ( $i = 0 ; $i < $span ; $i++ )
			{
				$this->date = ($i===0) ? $start : $start->addDay() ;
				if($request->has('days'))
				{
					if(in_array($this->date->dayOfWeek, $request->input('days'))) $this->addASingleDaySlots($time, $teacher_id);
				} else {
					$this->addASingleDaySlots($time, $teacher_id);
				}
			}
		}
		if(empty($this->timeslots) && \App\Timeslot::where('teacher_id',$teacher_id)->where('session_id','is not null')->whereBetween('slot', [$dbStart, $dbEnd])->get()->isEmpty())
		{
			flash("Your timeslots can't be updated because one or more classes have been booked for them.");
		} else {
			\App\Timeslot::where('teacher_id',$teacher_id)->whereBetween('slot', [$dbStart, $dbEnd])->delete();
			if(!empty($this->timeslots)) $request->user->deriveable->timeslots()->saveMany($this->timeslots);
			flash('Your timeslots have been updated.');
		}
	}

	/**
	 * Add timeslots for a given day.
	 *
	 * @param  Array $time
	 * @param  String $teacher_id
	 * @return void
	 */
	protected function addASingleDaySlots($time, $teacher_id)
	{
		foreach ($time as $key => $slot)
		{
			$last	=	($key===0) ? "0" : $time[$key-1] ;
			$tym = $this->date->addMinutes((30*($slot-$last)))->toDateTimeString();
			if(empty(\App\Timeslot::where('slot',$tym)->where('teacher_id',$teacher_id)->get()->first()->session_id))
			{
				$this->timeslots[] 	= new \App\Timeslot(['slot' => $tym]);
			}
		}
		$this->date->subMinutes(30*end($time));
	}
}