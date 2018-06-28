<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'phone', 'document', 'logo'];

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

}
