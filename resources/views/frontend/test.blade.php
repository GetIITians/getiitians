<?php

$timeslots = ["2016-03-09 17:30:00","2016-03-09 13:00:00","2016-03-09 13:30:00","2016-03-09 14:00:00", "2016-03-09 16:00:00", "2016-03-09 17:00:00", "2016-03-09 16:30:00", "2016-03-09 19:00:00"];
$day = date("j"); $month = date("n"); $year = date("Y");
$slots = [];
foreach ($timeslots as $timeslot) {
	if (date("jnY") == date("jnY", strtotime($timeslot))) {
		$slots[] = strtotime($timeslot);
	}
}
sort($slots);
$times = [];
$i = 0;
foreach ($slots as $key => $value) {
	if($key == 0){
		$times[$i]['start'] = date("g:i a", $value);
		$times[$i]['end'] = date("g:i a", ($value+1800));
		$times[$i]['old'] = $value;
	} else {
		if(($value-$times[$i-1]['old']) === 1800){
			$times[$i-1]['end'] = date("g:i a", ($value+1800));
			$times[$i-1]['old'] = $value;
			$i--;
		} else {
			$times[$i]['start'] = date("g:i a", $value);
			$times[$i]['end'] = date("g:i a", ($value+1800));
			$times[$i]['old'] = $value;
		}
	}
	$i++;
}
var_dump($times);

//echo date("jnY", mktime(0, 0, 0, 3, 8, 2016));

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

$search = null;

$result = ($search) ? TRUE : FALSE ;

var_dump($result);
?>