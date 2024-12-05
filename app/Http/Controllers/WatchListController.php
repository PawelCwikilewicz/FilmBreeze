<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Watchlist;

class WatchListController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $userId = auth()->id();

            $watchlistItems = Watchlist::with('movie')
                ->where('user_id', $userId)
                ->get();

            return view('watchlist', compact('watchlistItems'));
        }

        // Jak nie potwierdzi gościa to wypierdala error
        return redirect()->route('login')->with('error', 'Zaloguj sie gnomie');
    }

    public function add(Request $request)
    {

        $validated = $request->validate([
            'movieId' => 'required|integer|exists:movies,id',
        ]);
        if(!empty(auth()->id())){
        $user = User::find(auth()->id());
        $currentCount = $user->moviesWatchlist()->count();
        // Tu masz ograniczenie do ilości filmów na watchLiście ALE
        // trzeba to jakoś ogarnąć żeby pojawiał się komunikat PODCZAS DODAWANIA:
        // narazie testowo ustawiłem na 3 jako MAX w bazie danych :)
        if ($currentCount >= 3){
            return response()->json(['message' => 'Film nie został dodany do listy'], 400);
        }

        $user->moviesWatchlist()->syncWithoutDetaching($validated['movieId']);

        return response()->json(['message' => 'Film został dodany do listy'], 200);
        }
        return response()->json(['message' => 'Film nie został dodany do listy'], 400);
    }

    public function remove(Request $request)
    {
        $validated = $request->validate([
            'movieId' => 'required|integer|exists:movies,id',
        ]);

        if (auth()->check()) {
            $userId = auth()->id();
            $user = User::find($userId);
            $user->moviesWatchlist()->detach($validated['movieId']);

            // refresh watchlisty
            return redirect()->route('watchlist.index')->with('message', 'Film został usunięty z listy');
        }

        // na wszelki wypadek dałem przekierowanie na login page jakby jakoś się kurwa dało dostać do tego przycisku bo się zbuguje wylogowywanie
        return redirect()->route('login')->with('error', 'Zaloguj się, aby usunąć film z listy');
    }
}
