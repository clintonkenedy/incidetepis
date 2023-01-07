<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DispositivoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'descripcion'=> 'golaa',
            'oficina_id'=> 1,
            'marca'=> 'hp'
        ];
    }
}
