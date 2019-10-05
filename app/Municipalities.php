<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipalities extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'municipalities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'city_id'
    ];

}
