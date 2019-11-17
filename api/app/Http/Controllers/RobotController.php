<?php

namespace App\Http\Controllers;

use App\Robot;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RobotController extends Controller
{

    public function index()
    {
        return Robot::all();
    }

    public function show(Robot $robot)
    {
        return $robot;
    }

    public function store(Request $request)
    {
        $robot = Robot::create($request->all());

        return response()->json($robot, 201);
    }

    public function update(Request $request, Robot $robot)
    {
        $robot->update($request->all());

        return response()->json($robot, 200);
    }

    public function delete(Robot $robot)
    {
        $robot->delete();

        return response()->json(null, 204);
    }


}
