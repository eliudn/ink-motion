<?php

namespace Database\Factories;

use Src\Application\User\Infrastructure\Repositories\Eloquent\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 *@extends Factory<User>
 */
class UserFactory extends Factory
{

     /* Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nick_name' => fake()->unique()->name(),
            'email' => fake()->unique()->safeEmail(),
            'int_id'=>fn()=> $this->intId(),
            'password' => password_hash('defaul', PASSWORD_DEFAULT),
            'state_id'=> 2,
            'id'=>fake()->unique()->uuid(36)
        ];
    }

    /**
     * @return int
     */
    private function intId(): int
    {
        $intId =(int) User::where('int_id','>','0')
            ->orderBy('int_id', 'desc')
            ->select('int_id')
            ->first()
            ->int_id;
        return $intId+1;
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
