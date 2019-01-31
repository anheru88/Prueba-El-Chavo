<?php

namespace App\Http\Controllers;

use App\Person;
use App\Traits\PersonDataTrait;
use Request as Request2;

class ChavoController extends Controller
{
    use PersonDataTrait;

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

    public function delete($id)
    {
        $person = Person::findOrFail($id);

        $nicks = $person->nicks;

        foreach ($nicks as $nick) {
            $nick->delete();
        }

        $person->delete();

        return response()->json([
            'ok'
        ]);
    }
}
