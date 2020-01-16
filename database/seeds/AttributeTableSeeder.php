<?php

use Illuminate\Database\Seeder;
use App\Attribute;

class AttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $height_attribute = new Attribute();
        $height_attribute->name = 'height';
        $height_attribute->type = 'integer';
        $height_attribute->save();

        $width_attribute = new Attribute();
        $width_attribute->name = 'width';
        $width_attribute->type = 'integer';
        $width_attribute->save();

        $color_attribute = new Attribute();
        $color_attribute->name = 'color';
        $color_attribute->type = 'string';
        $color_attribute->save();

        $border_attribute = new Attribute();
        $border_attribute->name = 'border';
        $border_attribute->type = 'integer';
        $border_attribute->save();

        $border_color_attribute = new Attribute();
        $border_color_attribute->name = 'border_color';
        $border_color_attribute->type = 'string';
        $border_color_attribute->save();

        $border_radius_attribute = new Attribute();
        $border_radius_attribute->name = 'border_radius';
        $border_radius_attribute->type = 'integer';
        $border_radius_attribute->save();

    }
}
