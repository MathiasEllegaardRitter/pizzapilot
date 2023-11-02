<?php

namespace App\Http\Controllers;

use App\Models\Breakes;
use Illuminate\Http\Request;

class BreakesController extends Controller
{
    public function readAll()
    {
        // reads all the breakes in the DB
        $breakes = Breakes::all();

        return view('breakes', ['breakes' => $breakes]);
    }

    public function create(Request $request)
    {
        $break = new Breakes;
        //Set the properties of the new "Breakes" instance with data from the form
        $break->name = $request->input('name');
        $break->start_date = $request->input('start_date');
        $break->end_date = $request->input('end_date');
        $break->reason = $request->input('reason');
        // saves the new "Breakes" to the DB
        $break->save();

        // redirects the user to "breakes.create" route after the data has been saved
        return redirect()->route('breakes.create');
    }
}
