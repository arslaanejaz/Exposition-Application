<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Repositories\Contracts\SerializableInterface;

class Location extends Model implements SerializableInterface
{
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['address', 'lat', 'long'];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function hall()
    {
        return $this->hasOne('App\Hall');
    }

    public function serialize()
    {
        return [
            'id'=>$this->id,
            'address'=>$this->address,
            'lat'=>$this->lat,
            'long'=>$this->long,
            'event'=>$this->event
        ];
    }
}
