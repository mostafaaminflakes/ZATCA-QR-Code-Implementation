<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class par_codeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'inv'=>$this->faker->randomDigit(10),
                'Company_name' => $this->faker->Company(),
                'reqistration_id' => $this->faker->randomDigit(),
                'tax_id' => $this->faker->randomDigit(),
                'print_time' => $this->faker->date('Y_m_d'),
                'tot_vat' => $this->faker->randomFloat(2,0,8),
                'vat' => $this->faker->randomFloat(2,0,8),
                'printed_time' => $this->faker->randomDigit(),
        ];
    }
}
