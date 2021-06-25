<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Bin;
use App\Huesped;
use App\Sku;

class BinFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->word,
            'huesped_id' => Huesped::factory(),
            'sku_id' => Sku::factory(),
            'dailyDose' => $this->faker->randomFloat(2, 0, 999.99),
        ];
    }
}
