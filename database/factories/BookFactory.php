<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            // Author::inRandomOrder()->first()?->id() ?? Author::factory()
            "title"=>$this->faker->sentence(3),
            "isbn"=>$this->faker->unique()->isbn13(),
            "description"=>$this->faker->paragraph(),
            "author_id"=>$this->faker->randomElement([1,3]),
            "genre"=>$this->faker->randomElement(['fiction','motivational','non-fiction','Fantasy','Novel']),
            "published_at"=>$this->faker->date(),
            "total_copies"=>$this->faker->numberBetween(1,30),
            "available_copies"=>$this->faker->numberBetween(1,30),
            "price"=>$this->faker->randomFloat(2,50,90),
            "cover_image"=>$this->faker->imageUrl('200','300','books'.true),
            "status"=>$this->faker->randomElement(['available','unavailable'])
        ];
    }
}
