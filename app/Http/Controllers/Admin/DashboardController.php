<?php

namespace App\Http\Controllers\Admin;

use App\School;
use App\Team;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
//        dd(auth()->user());
        $user = auth()->user();
//        dd(($user->administers)[1]->pivot->school_id);
        $teams = [];
        foreach($user->administers as $administers) {
//            dd($administers->pivot->school_id);
            $teams[] = $administers->pivot->team_id;
//            $teams[] = Team::where('school_id', $administers->pivot->schoool_id)->get();
        }

//        dd($teams);
//        $user = User::where('school_id', $user->administers())->get();

        return view('admin.dashboard.index', compact('user', 'teams'));
    }
}
