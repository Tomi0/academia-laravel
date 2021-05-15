<?php

use Faker\Generator as Faker;

$factory->define(App\Document::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(6, true),
        'description' => $faker->paragraph,
        'url' => 'documents/' . $faker->file('/var/www/.documents', '/var/www/storage/app/public/documents', false),
        'subject_id' => $faker->numberBetween(1, 5)
    ];
});
