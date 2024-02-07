<?php

namespace App\Http\Controllers;

use App\Models\Joke;

use Illuminate\Http\Request;

class JokeController extends Controller
{
    public function random(){
        $joke = Joke::inRandomOrder()->first();
        return response()->json($joke);
    }
}
