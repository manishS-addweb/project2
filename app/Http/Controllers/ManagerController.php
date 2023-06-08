<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function indexplayer( ): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $teams = Team::all();
        $players = Player::all();
        return view('manager.player-index',compact('teams','players'));
    }


    public function createplayer(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $players = Player::all();
        $teams = Team::all();
        $categories = Category::all();
        return view('manager.create-player',compact('categories','teams','players'));

    }

    public function storeplayer(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'team_id' => 'required|exists:teams,id',
            'price' => 'required',
            'status' => 'required|in:active,inactive',
        ]);

        $player = new Player();
        $player->name = $validatedData['name'];
        $player->team_id = $validatedData['team_id'];
        $player->category_id = $request['category_id'];
        $player->price = $validatedData['price'];
        $player->status = $validatedData['status'];
        $player->save();
        return redirect()->route('index.player');
    }





}

