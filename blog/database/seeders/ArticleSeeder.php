<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Introduction à Laravel',
                'excerpt' => 'Découvrez les bases du framework Laravel et comment créer votre première application web.',
                'views' => 150,
                'published' => true,
            ],
            [
                'title' => 'Les Migrations Laravel',
                'excerpt' => 'Apprenez à gérer votre base de données avec les migrations Laravel de manière efficace.',
                'views' => 89,
                'published' => true,
            ],
            [
                'title' => 'Authentification avec Laravel UI',
                'excerpt' => 'Guide complet pour implémenter un système d\'authentification avec Laravel UI.',
                'views' => 234,
                'published' => true,
            ],
            [
                'title' => 'Les Relations Eloquent',
                'excerpt' => 'Maîtrisez les relations entre modèles avec Eloquent ORM.',
                'views' => 178,
                'published' => true,
            ],
            [
                'title' => 'Validation des Formulaires',
                'excerpt' => 'Techniques de validation des données de formulaires dans Laravel.',
                'views' => 92,
                'published' => true,
            ],
            [
                'title' => 'Les Middleware Laravel',
                'excerpt' => 'Comprendre et utiliser les middleware pour filtrer les requêtes HTTP.',
                'views' => 67,
                'published' => true,
            ],
            [
                'title' => 'API REST avec Laravel',
                'excerpt' => 'Créez une API RESTful complète avec Laravel et testez-la.',
                'views' => 312,
                'published' => true,
            ],
            [
                'title' => 'Les Jobs et Queues',
                'excerpt' => 'Gérez les tâches asynchrones avec les jobs et les queues Laravel.',
                'views' => 45,
                'published' => false,
            ],
            [
                'title' => 'Déploiement Laravel',
                'excerpt' => 'Guide pratique pour déployer votre application Laravel en production.',
                'views' => 201,
                'published' => true,
            ],
            [
                'title' => 'Tests Automatisés',
                'excerpt' => 'Écrivez des tests unitaires et fonctionnels pour votre application Laravel.',
                'views' => 56,
                'published' => true,
            ],
        ];

        foreach ($articles as $articleData) {
            $slug = Str::slug($articleData['title']);
            
            Article::updateOrCreate(
                ['slug' => $slug],
                [
                    'title' => $articleData['title'],
                    'excerpt' => $articleData['excerpt'],
                    'views' => $articleData['views'],
                    'published' => $articleData['published'],
                ]
            );
        }

        $this->command->info('✅ ' . count($articles) . ' articles créés avec succès.');
    }
}
