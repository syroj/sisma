<?php

use Illuminate\Database\Seeder;

class StafTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\staf::class,150)->create();
    }
}
