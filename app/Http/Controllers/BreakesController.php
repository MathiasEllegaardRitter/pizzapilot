<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Breakes;
use Illuminate\Http\RedirectResponse;

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
        $break->startTime = $request->input('startTime');
        $break->endTime = $request->input('endTime');
        $break->reason = $request->input('reason');
        // saves the new "Breakes" to the DB
        $break->save();
        // redirects the user to "breakes.create" route after the data has been saved
        return redirect()->route('breakes.create');
    }

    public function get(Request $request)
    {

        // Find a breakid from request
        $breakid = $request->input('break_id');

        // Find break from Database
        $break = Breakes::findOrFail($breakid);

        // If break exist else return error
        if($break)
        {
            return view('break', ['break' => $break]);
        } else
        {
            // TODO Error
        }

    }

    public function update(Request $request)
    {
        // Find a breakid from request
        $breakId = $request->input("break_id");

        // Find the break from database
        $break = Breakes::findOrFail($breakId);

        // Update the break with the new values and save if exist
        if($break)

        {

            $break->name = $request->input('name');
            $break->startTime = $request->input('startTime');
            $break->endTime = $request->input('endTime');
            $break->reason = $request->input('reason');
            // saves the new "Breakes" to the DB
            $break->save();
            // Load the same site  i am on.

            return view('break', ['break' => $break]);

        } else {

            // TODO Error

        }

 

    }



}
