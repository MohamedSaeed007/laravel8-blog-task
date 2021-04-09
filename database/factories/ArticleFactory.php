<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $filePath = public_path('uploads/articles_images');

        return [
            'title' => $this->faker->sentence(6),
        'description' => $this->faker->sentence(4),
        'content' => $this->faker->paragraph(6),
        'status' => 'published',
        'user_id' => '2',
        'image' => $this->faker->image($filePath,300,300,null,false),
        ];
    }
}
