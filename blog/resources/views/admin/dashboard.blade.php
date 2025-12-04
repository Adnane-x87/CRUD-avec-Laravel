{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto px-4 py-8">
        <h1 class="text-2xl font-semibold mb-4">Espace d’administration</h1>

        @auth
            <p class="mb-2">Utilisateur connecté : {{ Auth::user()->name }}</p>

            @if (Auth::user()->is_admin)
                <p class="text-sm text-emerald-700 font-medium">
                    Profil détecté : <span class="font-semibold">Admin</span>
                </p>
                <div class="mt-4">
                    <h2 class="text-xl font-semibold">Gestion des utilisateurs</h2>
                    <p class="text-sm">Vous pouvez gérer les utilisateurs ici.</p>
                </div>
            @else
                <p class="text-sm text-sky-700 font-medium">
                    Profil détecté : <span class="font-semibold">Auteur</span>
                </p>
                <div class="mt-4">
                    <h2 class="text-xl font-semibold">Bienvenue, Auteur</h2>
                    <p class="text-sm">Vous pouvez créer et gérer vos articles ici.</p>
                </div>
            @endif
        @endauth
    </div>
@endsection
