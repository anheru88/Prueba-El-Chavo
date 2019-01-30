<?php

use App\Nick;
use App\Person;
use Illuminate\Database\Seeder;

class PersonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        $persons = factory(Person::class, 10)->create();

        foreach ($persons as $person) {
            $numbersOfNicks = random_int(1, 5);
            for ($i = 0; $i < $numbersOfNicks; $i++) {
                $nickname = factory(Nick::class)->create();
                $person->nicks()->save($nickname);
            }
        }
    }
}
