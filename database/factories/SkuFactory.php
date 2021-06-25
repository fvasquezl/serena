<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Category;
use App\Presentation;
use App\Sku;
use App\Unit;
use App\User;

class SkuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sku::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'concentration' => $this->faker->word,
            'unitQty' => $this->faker->numberBetween(-10000, 10000),
            'skuDate' => $this->faker->date(),
            'unitInput' => $this->faker->randomFloat(2, 0, 999.99),
            'unitOutput' => $this->faker->randomFloat(2, 0, 999.99),
            'presentation_id' => Presentation::factory(),
            'unit_id' => Unit::factory(),
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
        ];
    }
}
