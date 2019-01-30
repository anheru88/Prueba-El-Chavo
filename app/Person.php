<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = "persons";

    protected $fillable = [
        'title',
        'name',
        'image',
        'apartment',
        'description'
    ];

    /*
     * This is the list of nicks names for this person.
     */
    public function nicks()
    {
        return $this->hasMany('App\Nick');
    }
}
