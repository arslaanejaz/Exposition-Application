<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'image', 'price'];

    public function hall()
    {
        return $this->belongsTo('App\Hall');
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
