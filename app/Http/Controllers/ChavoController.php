<?php

namespace App\Http\Controllers;

use App\Nick;
use App\Person;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Request as Request2;

class ChavoController extends Controller
{
    public function index()
    {
        list($sort, $persons) = $this->getDAta();

        return view('lists', compact('persons', 'sort'));
    }

    public function cards()
    {
        list($sort, $persons) = $this->getDAta();

        return view('cards', compact('persons', 'sort'));
    }

    public function create()
    {
        return view('create');
    }

    public function store()
    {
        $data = request()->all();

        $imageName = $data['name'] . '.' . request()->image->getClientOriginalExtension();

        request()->image->move(public_path('images'), $imageName);

        $data['image'] = 'images/' . $imageName;

        $person = Person::create($data);

        foreach (Request2::get('nickname') as $nickname) {
            $person->nicks()->create([
                'name' => $nickname
            ]);
        }

        return redirect()->route('chavo.lists')->with('message', 'Your person is submitted Successfully');
    }

    public function edit($id)
    {
        $person = Person::findOrFail($id);

        return view('edit')
            ->with('person', $person);
    }

    public function delete($id){
        $person = Person::findOrFail($id);

        $nicks = $person->nicks;

        foreach ($nicks as $nick){
            $nick->delete();
        }

        $person->delete();

        return redirect()->route('chavo.lists');
    }

    /**
     * @return array
     */
    public function getDAta(): array
    {
        $sort = Request2::get('sort');

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
