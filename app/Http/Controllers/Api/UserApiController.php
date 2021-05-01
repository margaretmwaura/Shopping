<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\ApiController;
use App\User;
use Carbon\Carbon;


class UserApiController extends ApiController
{

    public function getUsers()
    {

        $users = User::all();

        return response()->json(['users' => $users]);
    }

    public function getChartData()
    {
        $data = [];

        $users = User::all()->map(
            function (User $user) {
                return [
                    'created_at' => Carbon::parse($user->created_at)->format('d')
                ];
            }
        );
        $dusers = $users->groupBy('created_at')->toArray();

        foreach ($dusers as $x => $value) {
            $count = count($dusers[$x]);
//            $arrayData = array($x => $dusers[$x]);
            $arrayData = [];
            array_push($arrayData, $x , $count);
            array_push($data, $arrayData);
        }

        return $data;

    }
}
