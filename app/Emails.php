<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\States;

class Emails extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'emails';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'subject',
        'to',
        'message',
        'state_id'
    ];
    
    public function state()
    {
        return $this->belongsTo(States::class);
    }

}
