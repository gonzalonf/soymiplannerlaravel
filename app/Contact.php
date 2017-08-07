<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = ['id'];

    public function event()
    {
        return $this->belongsTo('App\Event','event_id');
    }
}
