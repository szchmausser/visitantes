<?php

$factory->define(App\Visitante::class, function (Faker\Generator $faker) {
    return [
        "ci" => $faker->name,
        "nombres_apellidos" => $faker->name,
        "telefono" => $faker->name,
        "correo" => $faker->name,
        "procedencia" => $faker->name,
        "motivo" => $faker->name,
        "fecha_entrada" => $faker->date("d/m/Y H:i:s", $max = 'now'),
        "fecha_salida" => $faker->date("d/m/Y H:i:s", $max = 'now'),
        "observaciones" => $faker->name,
    ];
});
