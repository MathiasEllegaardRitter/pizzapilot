<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Breakes;

class BreakesController extends Controller
{
    //
    public function readAll()
    {
        $breakes = Breakes::all();
        return view('breakes', ['breakes' => $breakes]);
    }
}
