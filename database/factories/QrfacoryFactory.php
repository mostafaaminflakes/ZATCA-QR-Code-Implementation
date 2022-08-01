<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class QrfacoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           
                'Company_name' => $this->faker->Company(),
                'reqistration_id' => $this->faker->number(10),
                'tax_id' => $this->faker->number(15),
                'print_time' => $this->faker->dateTime(10),
                'tot_vat' => $this->faker->randomFloat(2),
                'vat' => $this->faker->randomFloat(1),
                'printed_time' => $this->faker->number(1),
            
        ];
    }
}
