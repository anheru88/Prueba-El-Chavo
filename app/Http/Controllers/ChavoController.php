<?php

namespace App\Http\Controllers;

use App\Nick;
use App\Person;
use Request;

class ChavoController extends Controller
{
    public function index()
    {
        $persons = Person::paginate(9);

        return view('lists', compact('persons'));
    }

    public function cards()
    {
        list($sort, $persons) = $this->getDAta();

        return view('cards', compact('persons', 'sort'));
    }

    /**
     * @return array
     */
    public function getDAta(): array
    {
        $sort = Request::get('sort');

        if ($sort != null) {
            switch ($sort) {
                case "name":
                    $persons = Person::orderBy($sort)->paginate(9);
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
            $persons = Person::paginate(9);
        }
        return [$sort, $persons];
    }
}
