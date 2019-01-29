<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nick extends Model
{
    protected $table = "nicks";

    protected $fillable = [
        'name'
    ];

    /*
     * Get the person that own this nickname
     */
    public function person()
    {
        return $this->belongsTo('App\Person');
    }
}
