<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;
use Faker\Provider\DateTime; 

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Contact::class;
    
    public function definition()
    {
        return [
            'fullname'=> $this->faker->name,
            'gender'=> $this->faker->randomElement($array=(['1','2'])),
            'email' => $this->faker->email,
            'postcode' => $this->faker->postcode,
            'address' => $this->faker->address,
            'building_name' => $this->faker->secondaryAddress,
            'opinion' => $this->faker->realText(120),
            'created_at' => DateTime::dateTimeThisDecade() 
        ];
    }
}
