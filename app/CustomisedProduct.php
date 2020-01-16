<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomisedProduct extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id',
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function attributeOption()
    {
        return $this->belongsToMany('App\AttributeOption', 'attr_opt_prod', 'customised_products_id', 'attribute_options_id');
    }

}
