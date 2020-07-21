<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
	protected $fillable = ['name', 'version', 'server_size','server_location', 'game_type'];
}
