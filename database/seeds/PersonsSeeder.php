<?php

use App\Person;
use Illuminate\Database\Seeder;

class PersonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Person::class, 10)->create();
    }
}
