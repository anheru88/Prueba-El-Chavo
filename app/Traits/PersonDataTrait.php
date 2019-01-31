<?php
/**
 * Created by PhpStorm.
 * User: anheru88
 * Date: 30/01/19
 * Time: 07:35 PM
 */

namespace App\Traits;


use App\Person;

use Request as Request2;

trait PersonDataTrait
{
    /**
     * @return array
     */
    public function getDAta(): array
    {
        $sort = Request2::get('sort');

        if ($sort != null) {
            switch ($sort) {
                case "name":
                    $persons = Person::with('nicks')->orderBy($sort)->paginate(9);
                    break;
                case "nickname":
                    $persons = Person::with([
                        'nicks' => function ($nicks) {
                            $nicks->orderBy('name');
                        }
                    ])
                        ->orderBy('name')->paginate(9);
                    break;
            }
        } else {
            $persons = Person::with('nicks')->paginate(9);
        }

        foreach ($persons as $person) {

        }
        return [$sort, $persons];
    }
}