<?php

use App\Models\Product;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Product::class, function (Faker $faker) {
    return [
    	'name' => $faker->name, 
    	'sku' => $faker->word . "-" . $faker->randomNumber(2), 
    	'price' => $faker->randomNumber(2), 
    	'price_ek' => $faker->randomNumber(2), 
    	'description' => $faker->text(), 
    	'brand' => $faker->name, 
    	'color' => $faker->colorName, 
    	'rating' => $faker->numberBetween(1,5), 
    	'rating_count' => $faker->randomNumber(2), 
    	'stock' => $faker->randomNumber(5), 
    	'search_keyword' => $faker->words($nb = 3, $asText = true),
    ];
});
