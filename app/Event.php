<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'start_date_time', 'end_date_time'];

    public function locations()
    {
        return $this->hasMany('App\Location');
    }
}
