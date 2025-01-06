<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class BlogData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Пользователи
        User::create([
            'id' => 1101,
            'name' => 'Ryan Gosling',
            'email' => 'gosling@drive.com',
            'password' => 'TheDriver01!!',
        ]);

        User::create([
            'id' => 1102,
            'name' => 'Walter White',
            'email' => 'mrwhite@mad.com',
            'password' => 'MrWhite01!!',
        ]);

        User::create([
            'id' => 1103,
            'name' => 'Tyrion Lannister',
            'email' => 'gold@hands.com',
            'password' => 'Lannister01!!',
        ]);

        // Посты
        for ($i = 0; $i <= 25; $i++) {
            Post::create([
                'id' => fake()->unique()->numberBetween(1100, 1125),
                'published_at' => now()
                    ->subYear()
                    ->addDays(rand(0, 365))
                    ->format('Y-m-d H:i:s'),
                'title' => fake()->sentence(rand(2, 5)),
                'content' =>
                    "<p>" . fake()->paragraph(rand(10, 15)) . "</p><br/>" .
                    "<p>" . fake()->paragraph(rand(25, 35)) . "</p><br/>" .
                    "<p>" . fake()->paragraph(rand(10, 15)) . "</p><br/>",
                'tag' => ucfirst(fake()->word()),
                'views' => rand(100, 999),
                'author_id' => rand(1101, 1103),
            ]);
        }
    }
}
