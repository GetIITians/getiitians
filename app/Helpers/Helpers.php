<?php

use App\User;
use App\Teacher;
use App\Timeslot;

function flash($message = null)
{
	$flash = app('App\Http\Flash');
	if(func_num_args() == 0)
		return $flash;
	return $flash->message($message);
}

function authDetails()
{
	return [
		'user' 	=> Auth::user(),
		'id'	=> Auth::user()->id
	];
}

/**
 * Returns $output if $A is equal to $B
 *
 * @param 	string $A
 * @param 	string $B
 * @param 	string $output
 * @return	string $output
 */
function matchValue($A,$B,$output)
{
	return ($A===$B) ? $output : '' ;
}

/* Draws a calendar */
function draw_calendar($month,$year,$timeslots){

	/* draw table */
	$calendar = '<table>';

	/* table headings */
	$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	$calendar.= '<thead><tr><th>'.implode('</th><th>',$headings).'</th></tr></thead><tbody>';

	/* days and weeks vars now ... */
	$running_day = date('w',mktime(0,0,0,$month,1,$year)); // 0-6||Sunday-Saturday
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year)); // Days in month
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();
	$today = date("j");

	/* row for week one */
	$calendar.= '<tr>';

	/* print "blank" days until the first of the current week */
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="blocked"> </td>';
		$days_in_this_week++;
	endfor;

	/* keep going with days.... */
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		$calendar.= ($list_day == $today) ? '<td class="today">' : '<td>';
			$calendar.= $list_day;
			/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
			$timeslot = query_timeslots($list_day,$month,$year,$timeslots);
			if ($timeslot) {
				$calendar.= "<ul>";
				foreach ($timeslot as $key => $value) {
					$calendar.="<li>".$value['start']."-".$value['end']."</li>"; 
				}
				$calendar.= "</ul>";
			}
			//$calendar.= ;
			//$calendar.= str_repeat('<p> </p>',2);
		$calendar.= '</td>';

		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr>';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="blocked"> </td>';
		endfor;
	endif;

	/* final row */
	$calendar.= '</tr>';

	/* end the table */
	$calendar.= '</tbody></table>';
	
	/* all done, return result */
	return $calendar;
	//return $timeslots;
}

/* sample usages */
//echo draw_calendar(7,2009);

function query_timeslots($day,$month,$year,$timeslots){
	$day_slots = [];
	foreach ($timeslots as $timeslot) {
		if (date("jnY", mktime(0, 0, 0, $month, $day, $year)) == date("jnY", strtotime($timeslot->slot))) {
			$day_slots[] = strtotime($timeslot->slot);
		}
	}

	sort($day_slots);
	//return $day_slots;
	$slots = [];
	$i = 0;
	foreach ($day_slots as $key => $value) {
		if($key == 0){
			$slots[$i]['start'] = date("g:i a", $value);
			$slots[$i]['end'] = date("g:i a", ($value+1800));
			$slots[$i]['old'] = $value;
		} else {
			if(($value-$slots[$i-1]['old']) === 1800){
				$slots[$i-1]['end'] = date("g:i a", ($value+1800));
				$slots[$i-1]['old'] = $value;
				$i--;
			} else {
				$slots[$i]['start'] = date("g:i a", $value);
				$slots[$i]['end'] = date("g:i a", ($value+1800));
				$slots[$i]['old'] = $value;
			}
		}
		$i++;
	}

	return $slots;
}