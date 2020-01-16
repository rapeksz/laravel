<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeOption extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value', 'attributes_id',
    ];

    public function customisedProduct()
    {
        return $this->belongsToMany('App\CustomisedProduct', 'attr_opt_prod', 'attribute_options_id', 'customised_products_id');
    }

    public function attribute()
    {
        return $this->belongsTo('App\Attribute');
    }

}
