<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Municipalities;
use App\Countries;

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

    public function country() {
        return $this->belongsTo(Countries::class, 'country_code');
    }

    public function municipalities() {
        return $this->hasMany(Municipalities::class);
    }

}
