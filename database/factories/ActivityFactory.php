<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;



class ActivityFactory extends Factory
{


    public function definition()
    {

      return [
          'date' => fake()->date(),
          'task_code' => strtoupper(fake()->bothify('??-###')),
          'cycle_month' => substr(fake()->monthName(), 0, 3) . ' 2022',
          'activity_type' => strtoupper(fake()->bothify('???? (??/??)')),
          'team_code' => strtoupper(fake()->bothify('??-##')),
          'contract_code' => strtoupper(fake()->bothify('???###')),
          'area_cleared_sqm' => fake()->numberBetween(50, 1000),
          'num_deminers' => fake()->numberBetween(1, 30),
          'minutes_worked' => fake()->numberBetween(60, 600)
      ];


    }





}
