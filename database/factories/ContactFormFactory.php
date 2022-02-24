<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ContactForm;
use Faker\Generator as Faker;

$factory->define(ContactForm::class, function (Faker $faker) {
  return [
    'your_name' => $faker->name,
    'email' => $faker->unique()->email,
    'url' => $faker->url,
    'gender' => $faker->randomElement(['0','1']),
    'age' => $faker->numberBetween($min = 1, $max = 5),
    'contact' => $faker->realText(200),
  ];
});
