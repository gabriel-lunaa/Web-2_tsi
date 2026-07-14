<?php

namespace App\Http\Controllers;

use App\Models\User;

class FineController extends Controller
{
    public function index()
    {
        $users = User::where('debit', '>', 0)->get();

        return view('fines.index', compact('users'));
    }

    public function clear(User $user)
    {
        $user->update([
            'debit' => 0,
        ]);

        return redirect()->route('fines.index')
            ->with('success', 'Débito quitado com sucesso.');
    }
}