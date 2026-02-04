<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->query('q');

        $users = collect();

        if ($q) {
            $users = User::query()
                ->where(function ($query) use ($q) {
                    $query->where('username', 'like', "%{$q}%")
                        ->orWhere('email', 'like', "%{$q}%");
                })
                ->where('id', '!=', auth()->id())
                ->orderBy('username')
                ->paginate(10)
                ->withQueryString();
        }

        return view('search.index', compact('q', 'users'));

    }
}
