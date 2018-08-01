<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Post::class, function (Faker $faker) {
    return [
        'title' => \Faker\Provider\Lorem::sentence($nbWords = 6, $variableNbWords = true),
        'body' => \Faker\Provider\Lorem::paragraph($nbSentences = 3, $variableNbSentences = true)
    ];
});