<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Teacher;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', ['page' => 'dashboard', 'teachers' => Teacher::orderBy('id', 'desc')->paginate(15)]);
    }

    public function updateDisplay(Request $request, Teacher $teacher)
    {
        $teacher->display = intval($request->status);
        if($teacher->save())
          return \Response::json(['message' => 'Display status of '.$teacher->user->name.' has been updated.'], 200);
        else
          return \Response::json(['message' => 'There was some problem at the server side.'], 400);
    }

}
