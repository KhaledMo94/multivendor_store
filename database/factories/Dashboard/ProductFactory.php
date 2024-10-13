<?php

namespace Database\Factories\Dashboard;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dashboard\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();
        $price = fake()->randomFloat(2,5,1000);
        return [
            'name'                      =>$name,
            'slug'                      =>Str::slug($name),
            'description'               =>fake()->sentence(7),
            'meta_title'                =>fake()->name(),
            'meta_description'          =>fake()->sentence(20),
            'featured_image'            =>fake()->imageUrl(),
            'options'                   =>Null ,
            'product_images'            =>Null ,
            'meta_keywords'             =>Null ,
            'price'                     =>$price,
            'sale_price'                =>$price+20,
            'store_id'                  =>1
        ];
    }
}
