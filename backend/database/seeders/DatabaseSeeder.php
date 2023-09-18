<?php

namespace Database\Seeders;

use App\Models\Estimate;
use App\Models\EstimateField;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Estimate::factory()->create([
            'name' => "O'clock",
            'total_time' => 41 * 60
        ])
            ->lines()->createMany([
                ['label' => 'Mise en place', 'time' => 4 * 60],
                ['label' => 'Homepage', 'time' => 7 * 60],
                ['label' => 'Événements', 'time' => 14 * 60],
                ['label' => "Offres d'emploi", 'time' => 16 * 60],
                ['label' => 'Type de projet : Laravel', 'time' => 0, 'type' => 'additional'],
                ['label' => 'Type de design : Simple', 'time' => 0, 'type' => 'additional']
            ]);

        Estimate::factory()->create([
            'name' => "Méduse",
            'total_time' => round(60.2 * 60)
        ])
            ->lines()->createMany([
                ['label' => 'Mise en place', 'time' => 6 * 60],
                ['label' => 'Homepage', 'time' => 7 * 60],
                ['label' => 'Événements', 'time' => 14 * 60],
                ['label' => 'Offres d\'emploi', 'time' => 16 * 60],
                ['label' => 'Type de projet : Laravel + VueJS', 'time' => round(10.75 * 60), 'type' => 'additional'],
                ['label' => 'Type de design : Complexe', 'time' => round(6.45 * 60), 'type' => 'additional']
            ]);

        Estimate::factory()->create([
            'name' => "Minotaure",
            'total_time' => round(76.85 * 60)
        ])
            ->lines()->createMany([
                ['label' => 'Mise en place', 'time' => 6 * 60],
                ['label' => 'Homepage', 'time' => 7 * 60],
                ['label' => 'Événements', 'time' => 14 * 60],
                ['label' => 'Offres d\'emploi', 'time' => 16 * 60],
                ['label' => 'Blog', 'time' => 10 * 60],
                ['label' => 'Type de projet : Laravel + VueJS', 'time' => round(13.25 * 60), 'type' => 'additional'],
                ['label' => 'Type de design : Complexe avec animations', 'time' => round(10.6 * 60), 'type' => 'additional']
            ]);

        EstimateField::factory()->create([
            'name' => 'Nom du projet',
            'slug' => 'projectName',
            'type' => 'text'
        ]);

        EstimateField::factory()->create([
            'name' => 'Type de projet',
            'slug' => 'projectType',
            'type' => 'select'
        ])
            ->presetValues()->createMany([
                [
                    'label' => 'Laravel',
                    'value' => 'laravel',
                    'startup_time' => 4 * 60,
                    'total_percentage' => 0
                ],
                [
                    'label' => 'Laravel + VueJS',
                    'value' => 'laravelVueJS',
                    'startup_time' => 6 * 60,
                    'total_percentage' => 25
                ]
            ]);

        EstimateField::factory()->create([
            'name' => 'Développements génériques',
            'slug' => 'genericDevelopments',
            'type' => 'checkboxes'
        ])
            ->presetValues()->createMany([
                [
                    'label' => 'Homepage',
                    'value' => 'homePage',
                    'time' => 7 * 60,
                ],
                [
                    'label' => "Offres d'emploi",
                    'value' => 'jobs',
                    'time' => 16 * 60,
                ],
                [
                    'label' => "Blog",
                    'value' => 'blog',
                    'time' => 10 * 60,
                ],
                [
                    'label' => "Page éditoriale",
                    'value' => 'editorialPage',
                    'time' => 5 * 60,
                ],
                [
                    'label' => "Événements",
                    'value' => 'events',
                    'time' => 14 * 60,
                ]
            ]);

        EstimateField::factory()->create([
            'name' => 'Développements spécifiques',
            'slug' => 'specificDevelopments',
            'type' => 'multi'
        ]);

        EstimateField::factory()->create([
            'name' => 'Type de design',
            'slug' => 'designType',
            'type' => 'select'
        ])
            ->presetValues()->createMany([
                [
                    'label' => 'Simple',
                    'value' => 'simple',
                    'total_percentage' => 0,
                ],
                [
                    'label' => 'Complexe',
                    'value' => 'complex',
                    'total_percentage' => 15,
                ],
                [
                    'label' => 'Complexe avec animations',
                    'value' => 'complexAnimations',
                    'total_percentage' => 20,
                ]
            ]);
    }
}
