<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function toggleFavorite(Request $request, $ProductId)
    {
        $customer = auth()->user();

        if ($customer->favorites->contains($ProductId)) {
            // Remove from favorites
            $customer->favorites()->detach($ProductId);
            $message = 'Item removed from favorites.';
        } else {
            // Add to favorites
            $customer->favorites()->attach($ProductId);
            $message = 'Item added to favorites.';
        }

        return redirect()->back()->with('message', $message);
    }
public function viewFavorites() 
{
    $customer = auth()->user();

    // Eager load the favorites relationship
    $favorites = $customer->favorites()->get();

    return view('favorites', compact('favorites'));
}



}
