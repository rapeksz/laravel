<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = [
        'name', 'type',
    ];

    public function attribute_option()
    {
        return $this->hasMany('App\AttributeOption', 'attributes_id');
    }
}
