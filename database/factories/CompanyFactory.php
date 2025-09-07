<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
	protected $model = Company::class;

    public function definition(): array
    {
        return [
			'name' => $this->faker->company,
			'company_number' => $this->faker->unique()->numerify('COMP####'),
			'company_type' => $this->faker->randomElement(['lead', 'prospect', 'client']),

			'address_line1' => $this->faker->streetAddress,
			'address_line2' => $this->faker->optional()->secondaryAddress,
			'city' => $this->faker->city,
			'state' => $this->faker->state,
			'postal_code' => $this->faker->postcode,
			'country' => $this->faker->country,

			'phone_number' => $this->faker->phoneNumber,
			'email' => $this->faker->companyEmail,
			'website_url' => $this->faker->url,

			'industry' => $this->faker->word,
			'size' => $this->faker->numberBetween(1, 1000),
			'annual_revenue' => $this->faker->randomFloat(2, 10000, 10000000),
        ];
    }
}
