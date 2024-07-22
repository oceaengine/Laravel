<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Obat>
 */
class ObatFactory extends Factory
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
            'id_obat' => fake()->unique()->regexify('[A-E]{1}[0-9]{9}'),
            'nama_obat' => fake()->name(),
            'harga' => fake(),
            'quantity' => fake(),
            'id_kategori' => mt_rand(1,12)
        ];
    }
}
