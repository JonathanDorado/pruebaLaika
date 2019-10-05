<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cities;

class Countries extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'countries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'country_code'
    ];

    public function cities() {
        return $this->hasMany(Cities::class, 'country_code');
    }

}
