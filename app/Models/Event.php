<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'locality', 'event_type_id', 'date', 'img', 'participants', 'description'];

    protected $dates = ['date'];

    public function event_type() {
        return $this->belongsTo('App\Models\EventType');
    }
}
