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

        $chavo = Person::create([
            'title' => 'El',
            'name' => 'Chavo',
            'image' => 'images/chavo.jpg',
            'apartment' => 'Barril',
            'description' => 'Nuestro personaje principal, un niño huérfano que se instala en una humilde vecindad y que nos regala mil aventuras al lado de su nueva "familia".'
        ]);

        $nickChavo = Nick::create([
            'name' => 'EL Chavo'
        ]);

        $chavo->nicks()->save($nickChavo);

        $donRamon = Person::create([
            'title' => 'Don',
            'name' => 'Ramon',
            'image' => 'images/dnram.jpg',
            'apartment' => '7',
            'description' => '"Este personaje posee un gran corazón y carisma, a pesar de que sufre muchas injusticias en su diario vivir. Asume responsablemente sus obligaciones y nos divierte en cada participación.".'
        ]);

        $nickDonRamon = Nick::create([
            'name' => 'Don Ramon'
        ]);

        $donRamon->nicks()->save($nickDonRamon);

        $quico = Person::create([
            'title' => '',
            'name' => 'Quico',
            'image' => 'images/quico.jpg',
            'apartment' => '4',
            'description' => '"Un niño con una personalidad difícil, pero al mismo tiempo con una simpatía que nos divierte. Es hijo de doña Florinda y el mejor amigo del Chavo, a pesar de que pasan la mayor parte de su tiempo discutiendo.".'
        ]);

        $nickQuico = Nick::create([
            'name' => 'Cachetes de Marrana Flaca'
        ]);

        $quico->nicks()->save($nickQuico);

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
