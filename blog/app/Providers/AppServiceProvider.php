<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Article;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Gate: Auteur peut créer, Admin ne peut pas
        Gate::define('create-article', function ($user) {
            return $user->is_admin === false;
        });

        // Gate: Admin peut tout supprimer, Auteur seulement ses propres articles
        Gate::define('delete-article', function ($user, Article $article) {
            if ($user->is_admin) {
                return true;
            }
            return $article->user_id === $user->id;
        });
    }
}
