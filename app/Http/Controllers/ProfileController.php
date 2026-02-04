<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\FriendRequest;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     */
    public function edit(Request $request): View
    {
        $friends = $request->user()
            ->friends()
            ->select('users.id', 'users.name', 'users.username', 'users.email', 'users.avatar')
            ->get();

        return view('profile.edit', [
            'user' => $request->user(),
            'friends' => $friends,
        ]);
    }


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function show(User $user)
    {
        $authId = auth()->id();

        // Cas: je visite mon propre profil
        if ($authId === $user->id) {
            $friends = $user
                ->friends()
                ->select('users.id', 'users.name', 'users.username', 'users.email', 'users.avatar')
                ->get();

            return view('profile.edit', [
                'user' => $user,
                'friends' => $friends,
            ]);
        }

        // Déjà amis ?
        $isFriend = auth()->user()->friends()->where('users.id', $user->id)->exists();

        // Demande reçue (lui -> moi) en attente
        $incomingRequest = FriendRequest::where('sender_id', $user->id)
            ->where('receiver_id', $authId)
            ->where('status', 'pending')
            ->first();

        // Demande envoyée (moi -> lui) en attente
        $outgoingRequest = FriendRequest::where('sender_id', $authId)
            ->where('receiver_id', $user->id)
            ->where('status', 'pending')
            ->exists();

        // Définir un état simple pour la vue
        $friendState = match (true) {
            $isFriend => 'friends',
            (bool) $incomingRequest => 'incoming_pending',
            $outgoingRequest => 'outgoing_pending',
            default => 'none',
        };


        return view('users.show', compact('user', 'friendState', 'incomingRequest'));
    }


}
