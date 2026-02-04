<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\FriendRequest;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function send(User $user)
    {
        $senderId = auth()->id();
        $receiverId = $user->id;

        if ($senderId === $receiverId) {
            return back()->with('error', "Tu ne peux pas t'ajouter toi-même.");
        }

        // Déjà amis ?
        $alreadyFriends = \DB::table('friends')
            ->where('user_id', $senderId)->where('friend_id', $receiverId)
            ->orWhere(function ($q) use ($senderId, $receiverId) {
                $q->where('user_id', $receiverId)->where('friend_id', $senderId);
            })->exists();

        if ($alreadyFriends) {
            return back()->with('error', "Vous êtes déjà amis.");
        }

        // Demande déjà envoyée ?
        $exists = FriendRequest::where('sender_id', $senderId)
            ->where('receiver_id', $receiverId)
            ->where('status', 'pending')
            ->exists();

        if ($exists) {
            return back()->with('error', "Demande déjà envoyée.");
        }

        FriendRequest::create([
            'sender_id' => $senderId,
            'receiver_id' => $receiverId,
            'status' => 'pending',
        ]);

        return back()->with('success', "Demande envoyée ✅");
    }

    // Liste des demandes reçues
    public function requests()
    {
        $requests = FriendRequest::with('sender')
            ->where('receiver_id', auth()->id())
            ->where('status', 'pending')
            ->latest()
            ->get();

        return view('friends.requests', compact('requests'));
    }

    // Accepter
    public function accept(FriendRequest $request)
    {
        abort_if($request->receiver_id !== auth()->id(), 403);

        $request->update(['status' => 'accepted']);

        // Ajouter relation des deux côtés
        auth()->user()->friends()->syncWithoutDetaching([$request->sender_id]);
        User::find($request->sender_id)->friends()->syncWithoutDetaching([auth()->id()]);

        return back()->with('success', "Demande acceptée ✅");
    }

    // Refuser
    public function decline(FriendRequest $request)
    {
        abort_if($request->receiver_id !== auth()->id(), 403);

        $request->update(['status' => 'declined']);

        return back()->with('success', "Demande refusée ❌");
    }
}
