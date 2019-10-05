<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'country_code'
    ];

}
