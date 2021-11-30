<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BoardFactory extends Factory
{
    /**
     * Определите состояние модели по умолчанию.
     *
     * @return array
     */
    public function definition()
    {
        $category = [
            'Товары', 
            'Услуги', 
            'Недвижимость'
        ];
        return [
            'user_name' => $this->faker->firstName(),
            'advertisement' => mb_strimwidth($this->faker->realText($maxNbChars = 200, $indexSize = 2), 0, 50, "..."),
            'phone' => '7' . rand(900, 999) . rand(1000, 9999),
            'category' => $category[rand(0, count($category)-1)],
        ];
    }
}
