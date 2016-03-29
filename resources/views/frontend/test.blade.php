<?php
use App\User;
use App\Teacher;
use Carbon\Carbon;
/*
$timeslots = ["2016-03-17 17:30:00","2016-03-18 13:00:00","2016-03-18 13:30:00","2016-03-18 14:00:00", "2016-03-18 16:00:00", "2016-03-18 17:00:00", "2016-03-18 16:30:00", "2016-03-18 19:00:00"];
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
*/

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

//$search = null;
//$result = ($search) ? TRUE : FALSE ;
//var_dump($result);

//var_dump($user->deriveable->qualifications->first());

/*
$users = User::all();
foreach ($users as $key => $user) {
	var_dump($user->password);
	//$user->update(['password' => bcrypt($user->password)]);
}
*/

/*
$users = DB::connection('teaching')->table('users')->get();
$dobs = [];
foreach ($users as $key => $user) {
	$date = new Carbon();
	$date->setTimestamp($user->dob);
	$dobs[$user->id]['date_of_birth'] = $date->format('Y-m-d H:i:s');
}
var_dump($dobs);

echo "<hr>";

$Users = DB::connection('mysql')->table('users')->get();
foreach ($Users as $key => $user) {
	if (array_key_exists($user->id,$dobs)) {
		//$Table->where('id', $user->id)->update(['date_of_birth' => $dobs[$user->id]['date_of_birth']]);
		var_dump($user->date_of_birth);
		//var_dump(DB::connection('mysql')->table('users')->where('id', $user->id)->update(['date_of_birth' => $dobs[$user->id]['date_of_birth']]));
	}
}
*/
/*
$user = User::find(76);
var_dump($user->date_of_birth);
$date = Carbon::createFromFormat('Y-m-d G:i:s', $user->date_of_birth)->format('j M y');
//$date = Carbon::createFromTimestamp();
var_dump($date);
*/

/*
foreach (User::all() as $id => $user) {
	if(!$user->deriveable->timeslots->isEmpty()){
		foreach ($user->deriveable->timeslots as $key => $timeslot) {
			if($timeslot->slot->gte(Carbon::now()))
				var_dump($user->name." = ".$timeslot->slot);
		}
	}
}
*/

//	Random timeslots for 3 months
$possibilities = ['2016-03-05 00:00:00','2016-03-05 00:30:00','2016-03-05 01:00:00','2016-03-05 08:00:00','2016-03-05 08:30:00','2016-03-05 09:00:00','2016-03-05 09:30:00','2016-03-05 10:00:00','2016-03-05 10:30:00','2016-03-05 11:00:00','2016-03-05 11:30:00','2016-03-05 12:00:00','2016-03-05 12:30:00','2016-03-05 13:00:00','2016-03-05 13:30:00','2016-03-05 14:00:00','2016-03-05 14:30:00','2016-03-05 15:00:00','2016-03-05 15:30:00','2016-03-05 16:00:00','2016-03-05 16:30:00','2016-03-05 17:00:00','2016-03-05 17:30:00','2016-03-05 18:00:00','2016-03-05 18:30:00','2016-03-05 19:00:00','2016-03-05 19:30:00','2016-03-05 20:00:00','2016-03-05 20:30:00','2016-03-05 21:00:00','2016-03-05 21:30:00','2016-03-05 22:00:00','2016-03-05 22:30:00','2016-03-05 23:00:00','2016-03-05 23:30:00'];
function allDays($dates){
	$random_entry = abs(array_rand($dates)-1);
	$start 	= new DateTime($dates[$random_entry]);
	$end 		= new DateTime($dates[$random_entry+1]);
	$timeslots = [];
	for ($i=0; $i < 100; $i++) {
		$newStart = $start->add(new DateInterval('P1D'));
		$newEnd 	= $end->add(new DateInterval('P1D'));
		$timeslots[] = new DateTime($newStart->format('Y-m-d H:i:s'));
		$timeslots[] = new DateTime($newEnd->format('Y-m-d H:i:s'));
		//$timeslots[] = $i;
	}
	return $timeslots;
}

//var_dump(allDays($possibilities));

$teachers = Teacher::all();
foreach ($teachers as $number => $teacher) {
	//var_dump($teacher->id);
	if($teacher->id > 0){
		$timeslots = allDays($possibilities);
		foreach ($timeslots as $key => $time) {
			//var_dump($teacher->id." : ".$time);
			DB::table('timeslots')->insert(['teacher_id' => $teacher->id, 'slot' => $time, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
		}
	}
}

?>
