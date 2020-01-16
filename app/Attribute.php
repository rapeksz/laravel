<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public function attribute_option()
    {
        return $this->hasOne('App\AttributeOption');
    }
}
