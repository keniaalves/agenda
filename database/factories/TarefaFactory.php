<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Tarefa::class, function (Faker $faker) {
    $data = Carbon::createFromFormat('Y-m-d', $faker->date);

    return [
        'titulo'             => $faker->name,
        'descricao'          => $faker->realText,
        'data'               => $data->format('m/d/Y'),
        'comentario'         => $faker->realText,
        'user_id'     => function () {
            return factory('App\User')->create()->id;
        }
    ];
});
