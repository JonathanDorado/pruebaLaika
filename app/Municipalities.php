<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cities;

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
    
     public function municipality()
    {
        return $this->belongsTo(Cities::class);
    }

}
