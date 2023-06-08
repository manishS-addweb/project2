<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $users = User::all();
        return view('admin.manager-index',compact('users'));
    }





















    public function teamindex(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $teams = Team::all();
        return view('admin.team-index',compact('teams'));
    }


    public function teamcreate(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $users = User::where('role', '0')->get();
        $teams = Team::pluck('manager_id')->toArray();
        return view('admin.team-create',compact('teams','users'));
    }

    public function teamstore(Request $request): \Illuminate\Http\RedirectResponse
    {
//        if ($request->user()->role !== '1') {
//            return redirect()->back()->with('error', 'You do not have permission to create teams.');
//        }

        $teams = new Team();
        $teams->name=$request->name;
        $teams->manager_id = $request->manager_id;

        $teams->save();

        return redirect()->route('team.index');
    }

    public function editteam( $id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $teams = Team::findorFail($id);
        $users = User::where('id', '!= 0', $teams->manager_id)->get();
        return view('admin.edit-team',compact('teams','users'));

    }
    public function updateteam(Request $request, string $id): \Illuminate\Http\RedirectResponse
    {
        $teams = Team::findorFail($id);
        $teams->name=$request->name;
        $teams->manager_id = $request->input('dropdown');
        $teams->save();

        return redirect()->route('admin.team.index');
    }














}
