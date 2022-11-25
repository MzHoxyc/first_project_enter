<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guests extends Model
{
    protected $fillable = ['name','address','signature','event_id'];
    protected $table = 'guests';

    public function event(){
        return $this->belongsTo(Event::class);
    }
}
