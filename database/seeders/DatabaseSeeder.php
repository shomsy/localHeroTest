<?php

namespace Database\Seeders;

use App\Models\PostalCode;
use App\Models\SalesGuy;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SalesGuySeeder::class
        ]);
    }
}
