<?php

use Illuminate\Database\Eloquent\Factories\Factory;
use Sankokai\Press\Post;
use Illuminate\Support\Str;


class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * 
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = Faker\Factory::create('fr_FR');
        return [
            'identifier' => Str::random(),
            'slug' => Str::slug($faker->sentence),
            'title' => $faker->sentence,
            'body' => $faker->paragraph(),
            'extra' => json_encode(['test' => 'value']),
        ];
    }
}
// $factory->define(Post::class, function (Faker\Generator $faker) {
//     return [
//         'identifier' => Str::random(),
//         'slug' => Str::slug($faker->sentence),
//         'title' => $faker->sentence,
//         'body' => $faker->paragraph(),
//         'extra' => json_encode(['test' => 'value']),
//     ];
// });
