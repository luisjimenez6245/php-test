<?php

namespace App\Http\Controllers\API;

use App\Game;
use App\Http\Requests\StoreGame;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Game as GameResource;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games =  Game::paginate(15);
      
        return $games;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGame $request)
    {
        Game::create($request->validated());
        return response()->json(['status' => 'created'], 201); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return new GameResource($game);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        if ($request->name != null)
            $game->name = $request->name;
        if ($request->version != null)
            $game->version = $request->version;
        if ($request->server_size != null)
            $game->server_size = $request->server_size;
        if ($request->server_location != null)
            $game->server_location  = $request->server_location;
        if ($request->game_type != null)
            $game->game_type = $request->game_type;
        $game->save();
        return ($game);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        $game->delete();
        return ('ok');
    }
}
