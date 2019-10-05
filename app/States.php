<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Emails;

class States extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'states';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
    
    public function emails(){
        return $this->hasMany(Emails::class);
    }

}
