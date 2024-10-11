<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PasswordController extends Controller
{
    public function store(Request $request)
    {
        // Valider la requête pour s'assurer que le mot de passe est fourni
        $request->validate([
            'password' => 'required|string|min:6', // Par exemple, un mot de passe d'au moins 6 caractères
        ]);

        // Récupérer le mot de passe de la requête
        $password = $request->input('password');

        // Hacher le mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Écrire le mot de passe haché dans un fichier
        Storage::disk('local')->put('hashed_password.txt', $hashedPassword);

        // Retourner une réponse
        return response()->json(['message' => 'Mot de passe haché enregistré avec succès.']);
    }
}
