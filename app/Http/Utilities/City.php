<?php

namespace App\Http\Utilities;

class City
{
	protected static $cities = [
		'Haryana' => ['Sirsa', 'Karnal', 'Hisar', 'Ambala', 'Rohtak', 'Jind', 'Fatehabad', 'Kurukshetra'],
		'Punjab' => ['Amritsar', 'Patiala', 'Mohali', 'Moga', 'Muktsar', 'Gurdaspur', 'Bathinda'],
		'Uttar Pradesh' => ['Kanpur', 'Lucknow', 'Ettawa', 'Varanasi'],
		'Rajasthan' => ['Hanumangarh', 'Jaipur', 'Ganganagar', 'Udaipur', 'Jodhpur', 'Jaisalmer']
	];

	public static function states()
	{
		return array_keys(static::$cities);
	}

	public static function cities($state)
	{
		return static::$cities[$state];
	}

	public static function all()
	{
		return static::$cities;
	}
}