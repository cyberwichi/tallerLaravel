<?php

use Illuminate\Database\Seeder;

class ReparationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Reparation::class, 40)->create();
    }
}
