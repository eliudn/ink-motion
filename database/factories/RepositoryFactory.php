<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Application\MediaRepositories\Infrastructure\Enum\MediaRepositoryType;
use Src\Application\MediaRepositories\Infrastructure\Repositories\Eloquent\MediaRepository;
use Src\Application\User\Infrastructure\Repositories\Eloquent\User;

/**
 * @extends Factory<MediaRepository>
 */
class RepositoryFactory extends Factory
{
    protected $model = MediaRepository::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->name,
            'secondary_name'=>$this->faker->name,
            'detail'=>$this->faker->text,
            'media_repository_type'=>MediaRepositoryType::TEXT->value,
            'user_id'=>User::factory()->create()->id,
        ];
    }
}
