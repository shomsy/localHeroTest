<?php

namespace Tests\Feature;

use App\Models\PostalCode;
use App\Models\SalesGuy;
use App\Services\PostalCodeConflictValidator;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostalCodeConflictValidatorTest extends TestCase
{
    use WithFaker;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_validate_conflicts_successfully()
    {
        $allPostCodes = PostalCode::get();

        $salesGuy = SalesGuy::factory()
            ->count(1)
            ->hasCodes(3)
            ->create();

        $newSalesGuy = SalesGuy::with('codes')->find($salesGuy->first()->id);
        $existingPostalCode = PostalCode::inRandomOrder()->first();
        $newSalesGuy->codes()->create(['code' => $existingPostalCode->code]);

        $codes = $newSalesGuy->codes;

        $validaion = (new PostalCodeConflictValidator($allPostCodes))->validate($codes);

        $this->assertTrue(!empty($validaion));
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_validate_returns_empty_array_when_conflicts_dont_exist()
    {
        $allPostCodes = PostalCode::get();

        $salesGuy = SalesGuy::factory()
            ->count(1)
            ->hasCodes(3)
            ->create();

        $newSalesGuy = SalesGuy::with('codes')->find($salesGuy->first()->id);
        $newSalesGuy->codes()->create(['code' => $this->faker->unique()->numerify('###*')]);
        $this->faker;

        $codes = $newSalesGuy->codes;

        $validaion = (new PostalCodeConflictValidator($allPostCodes))->validate($codes);

        $this->assertEmpty($validaion);
    }
}
