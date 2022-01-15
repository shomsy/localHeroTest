<?php

namespace Database\Seeders;

use App\Models\PostalCode;
use App\Models\SalesGuy;
use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class SalesGuySeeder extends Seeder
{
    /**
     * The current Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Create a new seeder instance.
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected function withFaker(): Generator
    {
        return Container::getInstance()->make(Generator::class);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $salesGuys = SalesGuy::factory()
            ->count(5)
            ->hasCodes(7)
            ->create();

        $newSalesGuys = SalesGuy::find($salesGuys->pluck('id')->toArray());

        $newSalesGuys->each(function ($newSG) {
            $newPostalCodes = [];

            for ($i = 1; $i <= 3; $i++) {
                $newPostalCodes[] = ['code' => $this->faker->numerify('###*')];
            }

            $newSG->codes()->createMany($newPostalCodes);
        });
    }
}
