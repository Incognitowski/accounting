<?php

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
        $this->call(ContasPrimarias::class);
        $this->call(INSSTableSeeder::class);
        $this->call(IRRFTableSeeder::class);
        $this->call(SalarioFamiliaTableSeeder::class);
    }
}
