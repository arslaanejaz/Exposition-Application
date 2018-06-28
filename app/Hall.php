<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public function stands()
    {
        return $this->hasMany('App\Stand');
    }

    public function location()
    {
        return $this->belongsTo('App\Location');
    }
}
