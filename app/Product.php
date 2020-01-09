<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'color',
        'height',
        'width',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
