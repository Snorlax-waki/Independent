<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'name',
        'event',
        'hobby',
        'hobby2',
        'hobby3',
        'hobby4',
        'hobby5',
        'hobby_other',
        'fav_color',
        'fav_food_drink',
        'fav_thing',
        'memo',
        'status',
        'image',
        'idea',
        'url',
        'idea2',
        'url2',
        'idea3',
        'url3',
    ];

    protected $dates = [
        'xday'
      ];
    
    public function getEventNameAttribute()
    {
        return config('event.'.$this->event);
    }
}

    