<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Pessoa::class, function (Faker $faker) {
    $data = Carbon::createFromFormat('Y-m-d',$faker->date);
    return [
        'nome'        => $faker->name,
        'aniversario' => $data->format('m/d/Y'),
        'telefone'    => $faker->tollFreephoneNumber,
        'email'       => $faker->email,
        'user_id'     => null
    ];
});