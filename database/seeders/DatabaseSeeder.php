<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@email.net',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'phone' => '89999999999'
        ]);

        $categories = [
            'Медецина',
            'Переводы',
            'Отели',
            'Рестораны',
            'Банки',
            'Услуги юриста'
        ];
        foreach ($categories as $category) {
            \App\Models\Category::create([
                'name' => $category
            ]);
        }

        $parts = [
            'Терапия',
            'Стоматология',
            'Психиатрия',
            'Хирургия'
        ];
        foreach ($parts as $part){
            \App\Models\Part::create([
                'name' => $part,
                'category_id' => 1
            ]);
        }
    }
}
