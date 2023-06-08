<?php

namespace App\Http\Controllers;

use App\Models\Request;
use App\Models\Team;


class RequestController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $requests = Request::with(['user','team'])->whereHas('user',function ($query){
            $query->where('role','0');
        })->get();
        return view('admin.request-index', compact('requests'));
    }




//    public function approve(Request $request ): \Illuminate\Http\RedirectResponse
//    {
//
//        $request = Request::findOrFail($request->id);
//        $team = $request->team;
//        $team->players()->update(['team_id' => $team->id]);
//        $request->delete();
//        return redirect()->route('request.index');
//    }

    public function assignManager(Request $request, $id)
    {
        $teams = Team::findOrFail($id);
        $managerId = $request->input('manager_id');

        $existingTeam = Team::where('manager_id', $managerId)->first();
        if ($existingTeam) {
            return redirect()->back()->with('error', 'Manager is already assigned to a team.');
        }
        $teams->manager_id = $managerId;
        $teams->save();

        return redirect()->back()->with('success', 'Manager assigned successfully.');
    }


}
