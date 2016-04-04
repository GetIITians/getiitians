<?php
use App\User;
use App\Teacher;
use Carbon\Carbon;
use App\Subject;
use App\Topic;
use App\Grade;
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

?>

<!DOCTYPE html> <html> <head> <meta charset="UTF-8" /> <meta name="robots" content="noindex,nofollow" /> <style> /* Copyright (c) 2010, Yahoo! Inc. All rights reserved. Code licensed under the BSD License: http://developer.yahoo.com/yui/license.html */ html{color:#000;background:#FFF;}body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,code,form,fieldset,legend,input,textarea,p,blockquote,th,td{margin:0;padding:0;}table{border-collapse:collapse;border-spacing:0;}fieldset,img{border:0;}address,caption,cite,code,dfn,em,strong,th,var{font-style:normal;font-weight:normal;}li{list-style:none;}caption,th{text-align:left;}h1,h2,h3,h4,h5,h6{font-size:100%;font-weight:normal;}q:before,q:after{content:'';}abbr,acronym{border:0;font-variant:normal;}sup{vertical-align:text-top;}sub{vertical-align:text-bottom;}input,textarea,select{font-family:inherit;font-size:inherit;font-weight:inherit;}input,textarea,select{*font-size:100%;}legend{color:#000;} html { background: #eee; padding: 10px } img { border: 0; } #sf-resetcontent { width:970px; margin:0 auto; } .sf-reset { font: 11px Verdana, Arial, sans-serif; color: #333 } .sf-reset .clear { clear:both; height:0; font-size:0; line-height:0; } .sf-reset .clear_fix:after { display:block; height:0; clear:both; visibility:hidden; } .sf-reset .clear_fix { display:inline-block; } .sf-reset * html .clear_fix { height:1%; } .sf-reset .clear_fix { display:block; } .sf-reset, .sf-reset .block { margin: auto } .sf-reset abbr { border-bottom: 1px dotted #000; cursor: help; } .sf-reset p { font-size:14px; line-height:20px; color:#868686; padding-bottom:20px } .sf-reset strong { font-weight:bold; } .sf-reset a { color:#6c6159; cursor: default; } .sf-reset a img { border:none; } .sf-reset a:hover { text-decoration:underline; } .sf-reset em { font-style:italic; } .sf-reset h1, .sf-reset h2 { font: 20px Georgia, "Times New Roman", Times, serif } .sf-reset .exception_counter { background-color: #fff; color: #333; padding: 6px; float: left; margin-right: 10px; float: left; display: block; } .sf-reset .exception_title { margin-left: 3em; margin-bottom: 0.7em; display: block; } .sf-reset .exception_message { margin-left: 3em; display: block; } .sf-reset .traces li { font-size:12px; padding: 2px 4px; list-style-type:decimal; margin-left:20px; } .sf-reset .block { background-color:#FFFFFF; padding:10px 28px; margin-bottom:20px; -webkit-border-bottom-right-radius: 16px; -webkit-border-bottom-left-radius: 16px; -moz-border-radius-bottomright: 16px; -moz-border-radius-bottomleft: 16px; border-bottom-right-radius: 16px; border-bottom-left-radius: 16px; border-bottom:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc; } .sf-reset .block_exception { background-color:#ddd; color: #333; padding:20px; -webkit-border-top-left-radius: 16px; -webkit-border-top-right-radius: 16px; -moz-border-radius-topleft: 16px; -moz-border-radius-topright: 16px; border-top-left-radius: 16px; border-top-right-radius: 16px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc; overflow: hidden; word-wrap: break-word; } .sf-reset a { background:none; color:#868686; text-decoration:none; } .sf-reset a:hover { background:none; color:#313131; text-decoration:underline; } .sf-reset ol { padding: 10px 0; } .sf-reset h1 { background-color:#FFFFFF; padding: 15px 28px; margin-bottom: 20px; -webkit-border-radius: 10px; -moz-border-radius: 10px; border-radius: 10px; border: 1px solid #ccc; } </style> </head> <body> <div id="sf-resetcontent" class="sf-reset"> <h1>Whoops, looks like something went wrong.</h1> <h2 class="block_exception clear_fix"> <span class="exception_counter">1/1</span> <span class="exception_title"><abbr title="Symfony\Component\Debug\Exception\FatalErrorException">FatalErrorException</abbr> in <a title="C:\xampp\htdocs\redesign\app\Http\Controllers\ProfileController.php line 51" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">ProfileController.php line 51</a>:</span> <span class="exception_message">Call to a member function move() on null</span> </h2> <div class="block"> <ol class="traces list_exception"> <li> in <a title="C:\xampp\htdocs\redesign\app\Http\Controllers\ProfileController.php line 51" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">ProfileController.php line 51</a></li> <li>at <abbr title="Symfony\Component\Debug\Exception\FatalErrorException">FatalErrorException</abbr>->__construct() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Foundation\Bootstrap\HandleExceptions.php line 133" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">HandleExceptions.php line 133</a></li> <li>at <abbr title="Illuminate\Foundation\Bootstrap\HandleExceptions">HandleExceptions</abbr>->fatalExceptionFromError() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Foundation\Bootstrap\HandleExceptions.php line 118" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">HandleExceptions.php line 118</a></li> <li>at <abbr title="Illuminate\Foundation\Bootstrap\HandleExceptions">HandleExceptions</abbr>->handleShutdown() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Foundation\Bootstrap\HandleExceptions.php line 0" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">HandleExceptions.php line 0</a></li> <li>at <abbr title="App\Http\Controllers\ProfileController">ProfileController</abbr>->updateProfilePic() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Routing\Controller.php line 256" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Controller.php line 256</a></li> <li>at <abbr title=""></abbr>call_user_func_array:{C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Routing\Controller.php:256}() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Routing\Controller.php line 256" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Controller.php line 256</a></li> <li>at <abbr title="Illuminate\Routing\Controller">Controller</abbr>->callAction() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Routing\ControllerDispatcher.php line 164" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">ControllerDispatcher.php line 164</a></li> <li>at <abbr title="Illuminate\Routing\ControllerDispatcher">ControllerDispatcher</abbr>->call() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Routing\ControllerDispatcher.php line 112" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">ControllerDispatcher.php line 112</a></li> <li>at <abbr title="Illuminate\Routing\ControllerDispatcher">ControllerDispatcher</abbr>->Illuminate\Routing\{closure}() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php line 139" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 139</a></li> <li>at <abbr title=""></abbr>call_user_func:{C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:139}() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php line 139" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 139</a></li> <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->Illuminate\Pipeline\{closure}() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php line 103" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 103</a></li> <li>at <abbr title=""></abbr>call_user_func:{C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:103}() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php line 103" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 103</a></li> <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->then() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Routing\ControllerDispatcher.php line 114" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">ControllerDispatcher.php line 114</a></li> <li>at <abbr title="Illuminate\Routing\ControllerDispatcher">ControllerDispatcher</abbr>->callWithinStack() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Routing\ControllerDispatcher.php line 69" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">ControllerDispatcher.php line 69</a></li> <li>at <abbr title="Illuminate\Routing\ControllerDispatcher">ControllerDispatcher</abbr>->dispatch() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Routing\Route.php line 203" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Route.php line 203</a></li> <li>at <abbr title="Illuminate\Routing\Route">Route</abbr>->runWithCustomDispatcher() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Routing\Route.php line 134" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Route.php line 134</a></li> <li>at <abbr title="Illuminate\Routing\Route">Route</abbr>->run() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Routing\Router.php line 708" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Router.php line 708</a></li> <li>at <abbr title="Illuminate\Routing\Router">Router</abbr>->Illuminate\Routing\{closure}() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php line 139" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 139</a></li> <li>at <abbr title=""></abbr>call_user_func:{C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:139}() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php line 139" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 139</a></li> <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->Illuminate\Pipeline\{closure}() in <a title="C:\xampp\htdocs\redesign\app\Http\Middleware\Authenticate.php line 45" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Authenticate.php line 45</a></li> <li>at <abbr title="App\Http\Middleware\Authenticate">Authenticate</abbr>->handle() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php line 124" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 124</a></li> <li>at <abbr title=""></abbr>call_user_func_array:{C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:124}() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php line 124" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 124</a></li> <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->Illuminate\Pipeline\{closure}() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php line 103" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 103</a></li> <li>at <abbr title=""></abbr>call_user_func:{C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:103}() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php line 103" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 103</a></li> <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->then() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Routing\Router.php line 710" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Router.php line 710</a></li> <li>at <abbr title="Illuminate\Routing\Router">Router</abbr>->runRouteWithinStack() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Routing\Router.php line 675" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Router.php line 675</a></li> <li>at <abbr title="Illuminate\Routing\Router">Router</abbr>->dispatchToRoute() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Routing\Router.php line 635" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Router.php line 635</a></li> <li>at <abbr title="Illuminate\Routing\Router">Router</abbr>->dispatch() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php line 236" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Kernel.php line 236</a></li> <li>at <abbr title="Illuminate\Foundation\Http\Kernel">Kernel</abbr>->Illuminate\Foundation\Http\{closure}() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php line 139" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 139</a></li> <li>at <abbr title=""></abbr>call_user_func:{C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:139}() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php line 139" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 139</a></li> <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->Illuminate\Pipeline\{closure}() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken.php line 50" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">VerifyCsrfToken.php line 50</a></li> <li>at <abbr title="Illuminate\Foundation\Http\Middleware\VerifyCsrfToken">VerifyCsrfToken</abbr>->handle() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php line 124" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 124</a></li> <li>at <abbr title=""></abbr>call_user_func_array:{C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:124}() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php line 124" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 124</a></li> <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->Illuminate\Pipeline\{closure}() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\View\Middleware\ShareErrorsFromSession.php line 49" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">ShareErrorsFromSession.php line 49</a></li> <li>at <abbr title="Illuminate\View\Middleware\ShareErrorsFromSession">ShareErrorsFromSession</abbr>->handle() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php line 124" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 124</a></li> <li>at <abbr title=""></abbr>call_user_func_array:{C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:124}() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php line 124" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 124</a></li> <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->Illuminate\Pipeline\{closure}() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Session\Middleware\StartSession.php line 62" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">StartSession.php line 62</a></li> <li>at <abbr title="Illuminate\Session\Middleware\StartSession">StartSession</abbr>->handle() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php line 124" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 124</a></li> <li>at <abbr title=""></abbr>call_user_func_array:{C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:124}() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php line 124" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 124</a></li> <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->Illuminate\Pipeline\{closure}() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse.php line 37" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">AddQueuedCookiesToResponse.php line 37</a></li> <li>at <abbr title="Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse">AddQueuedCookiesToResponse</abbr>->handle() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php line 124" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 124</a></li> <li>at <abbr title=""></abbr>call_user_func_array:{C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:124}() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php line 124" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 124</a></li> <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->Illuminate\Pipeline\{closure}() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Cookie\Middleware\EncryptCookies.php line 59" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">EncryptCookies.php line 59</a></li> <li>at <abbr title="Illuminate\Cookie\Middleware\EncryptCookies">EncryptCookies</abbr>->handle() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php line 124" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 124</a></li> <li>at <abbr title=""></abbr>call_user_func_array:{C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:124}() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php line 124" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 124</a></li> <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->Illuminate\Pipeline\{closure}() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode.php line 44" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">CheckForMaintenanceMode.php line 44</a></li> <li>at <abbr title="Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode">CheckForMaintenanceMode</abbr>->handle() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php line 124" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 124</a></li> <li>at <abbr title=""></abbr>call_user_func_array:{C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:124}() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php line 124" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 124</a></li> <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->Illuminate\Pipeline\{closure}() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php line 103" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 103</a></li> <li>at <abbr title=""></abbr>call_user_func:{C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:103}() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php line 103" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 103</a></li> <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->then() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php line 122" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Kernel.php line 122</a></li> <li>at <abbr title="Illuminate\Foundation\Http\Kernel">Kernel</abbr>->sendRequestThroughRouter() in <a title="C:\xampp\htdocs\redesign\vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php line 87" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Kernel.php line 87</a></li> <li>at <abbr title="Illuminate\Foundation\Http\Kernel">Kernel</abbr>->handle() in <a title="C:\xampp\htdocs\redesign\public\index.php line 54" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">index.php line 54</a></li> <li>at <abbr title=""></abbr>{main}() in <a title="C:\xampp\htdocs\redesign\public\index.php line 0" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">index.php line 0</a></li> </ol> </div> </div> </body> </html>
