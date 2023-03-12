<?php

namespace App\Http\Controllers;

use App\Mail\genericMail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        return view('admin.users.index', [
            'users' => User::all()
        ]);
    }

    public function sendEmail(Request $request, User $user): RedirectResponse
    {
        $validatedData = $request->validate([
            'object' => 'required|max:255',
            'content' => 'required|string',
        ]);

        if(empty($user->email)) {
            return redirect()->route('users.index')
                ->with('error', "L'email de l'utilisateur est vide");
        }

        Mail::to($user->email)->send(new genericMail($validatedData));

        return redirect()->route('users.index')
            ->with('success', 'Le mail a bien été envoyé');
    }
}
