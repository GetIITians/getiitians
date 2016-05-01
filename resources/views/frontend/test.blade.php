<?php
use App\User;
use App\Teacher;
use App\Student;
use Carbon\Carbon;
use App\Subject;
use App\Topic;
use App\Grade;
use App\Qualifications;
use App\Language;
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
/*
//	Random timeslots for 3 months
$possibilities = ['2016-03-31 00:00:00','2016-03-31 00:30:00','2016-03-31 01:00:00','2016-03-31 08:00:00','2016-03-31 08:30:00','2016-03-31 09:00:00','2016-03-31 09:30:00','2016-03-31 10:00:00','2016-03-31 10:30:00','2016-03-31 11:00:00','2016-03-31 11:30:00','2016-03-31 12:00:00','2016-03-31 12:30:00','2016-03-31 13:00:00','2016-03-31 13:30:00','2016-03-31 14:00:00','2016-03-31 14:30:00','2016-03-31 15:00:00','2016-03-31 15:30:00','2016-03-31 16:00:00','2016-03-31 16:30:00','2016-03-31 17:00:00','2016-03-31 17:30:00','2016-03-31 18:00:00','2016-03-31 18:30:00','2016-03-31 19:00:00','2016-03-31 19:30:00','2016-03-31 20:00:00','2016-03-31 20:30:00','2016-03-31 21:00:00','2016-03-31 21:30:00','2016-03-31 22:00:00','2016-03-31 22:30:00','2016-03-31 23:00:00','2016-03-31 23:30:00'];
function allDays($dates){
	$random_entry = abs(array_rand($dates)-1);
	$start 	= new DateTime($dates[$random_entry]);
	$end 		= new DateTime($dates[$random_entry+1]);
	$timeslots = [];
	for ($i=0; $i < 50; $i++) {
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
*/

/*
$ratings = [ 3.50, 3.75, 4.00, 4.25, 4.50, 4.75, 5.00];
$teachers = Teacher::all();
foreach ($teachers as $number => $teacher) {
	if($teacher->id > 0){
		//var_dump($teacher->rating);
		$teacher->rating = $ratings[array_rand($ratings)];
		$teacher->rating_count = mt_rand(1,5);
		$teacher->save();
	}
}
*/
/*
$ids = [28,41,44,52,60,76,180,191,246,260,284];

foreach ($ids as $id) {
	$teacher = User::find($id)->deriveable;
	foreach ($teacher->topics as $topic) {
		$subject_id = $topic->subject->id;
		$query 			= Topic::where('subject_id',$subject_id);
		$count 			=	floor(($query->count())/2);
		$collection = $query->get();
		$topics			=	$collection->random($count);
		foreach ($topics->all() as $topic) {
			//var_dump($topic->name);
			$teacher->topics()->save($topic);
		}
		echo '<hr>'.$count;
		var_dump($teacher);
	}
}
*/

/*
$users = User::all();
foreach ($users as $user) {
	var_dump($user->picture);
	$user->picture = "img/profile/".$user->picture;
	$user->save();
	if ($user->picture != '0')
	{
		//var_dump(Storage::disk('local')->has($user->picture));
		if(!Storage::disk('local')->has($user->picture))
		{
			if (strtolower($user->gender) == 'f')
				$user->picture = "female.png";
			else
				$user->picture = "male.png";
			$user->save();
		}
	}
	else
	{
		if (strtolower($user->gender) == 'f')
			$user->picture = "female.png";
		else
			$user->picture = "male.png";
		$user->save();
	}
}
*/

//var_dump(App\Teacher::find(76)->qualifications->count());
/*
 $i = 0; ?>
@foreach (App\Teacher::find(76)->qualifications as $qualification)
	var_dump({!! Form::text('qualification[][branch]', $qualification->branch,['class' => 'form-control']) !!})
	<?php echo Form::text('qualification['.$i.'][branch]', $qualification->branch,['class' => 'form-control']) ?>
	<?php $i++; ?>
	var_dump({{$i}});
	var_dump({!!$i!!});
@endforeach
<?php */


/*
$teacher = Teacher::find(76);
//	Sample subjects structure
$topics = [
	'Class-XI' => [
		'price' => 500,
		'subjects' => [
			'Physics' => ['Waves', 'Oscillations', 'Kinetic Theory', 'Mechanical Properties of Fluid', 'System of Particles and Rotation', 'Units and Measurement', 'Physical World', 'Work, Energy and Power']
		]
	],
	'IIT-Advance' => [
		'price' => 1200,
		'subjects' => [
			'Mathematics' => ['Vector Algebra', 'Three Dimensional Geometry', 'Differential Equations', 'Integral Calculus', 'Binomial Theorem and its Simple Proof', 'Complex Numbers and Quadratic Equations']
		]
	]
] ;

foreach (App\Grade::all() as $key => $grade) {
	var_dump($grade->name);
	foreach ($grade->subjects as $key => $subject) {
		var_dump($subject->name);
		foreach ($subject->topics as $key => $topic) {
			var_dump($topic->name);
		}
		echo "<hr>";
	}
	echo "<hr>";
}
*/

/*
$time = [
    0 => "0",
    1 => "1",
    2 => "2",
    3 => "3",
    4 => "42",
    5 => "43",
    6 => "46",
    7 => "47"
  ];
$days = [
    0 => "6",
    1 => "0"
  ];

$start	=	"18-Apr-2016 00:00:00";
$end 		=	"01-May-2016 00:00:00";

$start_carbon = Carbon::createFromFormat('d-M-Y H:i:s', $start);
$end_carbon = Carbon::createFromFormat('d-M-Y H:i:s', $end);
$diff = $end_carbon->diffInDays($start_carbon);
$timeslots = [];

for ($i=0; $i <= $diff; $i++) {
	$date = ($i===0) ? $start_carbon : $start_carbon->addDay() ;
	var_dump($date->dayOfWeek." - ".$date);
	if(in_array($date->dayOfWeek, $days))
	{
		//var_dump($date);
		foreach ($time as $key => $slot) {
			$last = ($key===0) ? "0" : $time[$key-1] ;
			$timeslots[] = $date->addMinutes((30*($slot-$last)))->toDateTimeString();
		}
		$date->subMinutes(30*end($time));
	}
}
//dd($timeslots);
*/
\DB::listen(function($sql, $bindings, $time) {
    var_dump($sql);
    var_dump($bindings);
    var_dump($time);
});


/*
$teacher = Teacher::find(76);

$dates = ["2016-04-24","2016-04-25","2016-04-26","2016-04-27"];


$slots = \App\Timeslot::where('teacher_id',$teacher->id)
				->where(function($query) use ($dates){
					foreach ($dates as $date) {
						$query->orWhereBetween('slot', [(new Carbon($date))->toDateTimeString(), (new Carbon($date))->addDay()->toDateTimeString()]);
					}
				})
				->get();

$available = [] ;
foreach ($slots as $slot) {
	$minute = (strlen($slot->slot->minute) == 1) ? '00' : '30' ;
	$available[$slot->slot->day][] = $slot->slot->hour.':'.$minute;
}

$toBeSent = array_shift($available) ;
foreach ($available as $value) {
	$toBeSent = array_intersect($toBeSent,$value);
}
dd($toBeSent);
//dd(array_intersect($available['24'], $available['25'], $available['26'], $available['27']));
*/

//dd($teacher->topics);
//dd(Student::find(3)->chats);
$galBaat = [] ;
$userType = Auth::user()->typeOfUser();
//\App\Chat::where('student_id', 3)->orderBy('created_at', 'desc')->get()
$galaan = Student::find(3)->chats()->orderBy('created_at', 'desc')->get();
foreach ( $galaan as $id => $chat) {
  $key = ( $userType == 'student') ? ucwords(strtolower($chat->teacher->user->name)) : ucwords(strtolower($chat->student->user->name)) ;
  $keyID = ( $userType == 'student') ? ucwords(strtolower($chat->teacher->user->id)) : ucwords(strtolower($chat->student->user->id)) ;
  $galBaat[$key]['content'][$id]['sender'] = ($chat->sender == Auth::user()->id) ? 'self' : 'other' ;
  $galBaat[$key]['content'][$id]['message'] = $chat->message;
  $galBaat[$key]['content'][$id]['ts'] = $chat->created_at;
  $galBaat[$key]['id'] = $keyID;
}
echo "<pre>";print_r($galBaat);echo "</pre>";

?>
