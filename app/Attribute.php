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
        return $this->hasOne('App\AttributeOption', 'attributes_id');
    }
}
