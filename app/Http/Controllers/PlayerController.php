<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function indexplayers( ): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $players = Player::all();
        return view('admin.players-index',compact('players'));
    }

    public function createplayers(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $players = Player::all();
        $teams = Team::withCount('players')->get();
        $categories = Category::all();
        return view('admin.create-players',compact('categories','teams','players'));

    }

    public function storeplayers(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'team_id' => 'required|exists:teams,id',
            'price' => 'required',
            'status' => 'required|in:active,inactive',
        ]);
        $team = Team::findOrFail($validatedData['team_id']);

        if ($team->players()->count() >= 15) {
            return redirect()->back()->with('error', 'The team already has the maximum limit of players (15).');
        }


        $player = new Player();
        $player->name = $validatedData['name'];
        $player->team_id = $validatedData['team_id'];
        $player->category_id = $request['category_id'];
        $player->price = $validatedData['price'];
        $player->status = $validatedData['status'];
        $player->save();
        return redirect()->route('index.players');
    }


    public function editplayers($id)
    {
        $teams =Team::all();
        $categories = Category::all();
        $player = Player::findOrFail($id);
        return view('admin.players-edit', compact('player','categories','teams'));
    }

    public function updateplayers(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'team_id' => 'required|exists:teams,id',
            'price' => 'required',
            'status' => 'required|in:active,inactive',
        ]);

        $player = Player::findorFail($id);
        $player->name = $validatedData['name'];
        $player->team_id = $validatedData['team_id'];
        $player->category_id = $request['category_id'];
        $player->price = $validatedData['price'];
        $player->status = $validatedData['status'];
        $player->save();


        return redirect()->route('index.players');
    }

    public function destroyplayers($id)
    {
        $player = Player::findOrFail($id);
        $player->delete();
        return redirect()->route('index.players');
    }

    public function playercountindex()
    {

        $teams = Team::withCount('players')->get();
        $players =Player::all();
        return view('admin.players-count-index', compact('teams','players'));
    }




}
