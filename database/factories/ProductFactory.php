<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $catagory_name = $this->faker->unique()->words($nb=2,$asText=true);

        $slug = Str::slug($catagory_name);

        return [

            'name' => $catagory_name,
            'slug' => $slug,
            'short_description'=>$this->faker->text(200),
            'description'=>$this->faker->text(500),
            'reguler_price'=> $this->faker->numberBetween(10,300),
            'SKU'=>'DIGT'.$this->faker->unique()->numberBetween(200,500),
            'stock_status'=>'instock',
            'queantity'=>$this->faker->numberBetween(100,130),
            'image'=> 'digital_'.$this->faker->unique()->numberBetween(1,22).'.jpg',
            'catagorie_id'=> $this->faker->numberBetween(1,5),
            'catagories_id'=> $this->faker->numberBetween(1,5),

        ];
    }
}
