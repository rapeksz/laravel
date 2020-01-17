<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Attribute;
use App\AttributeOption;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\CustomisedProduct;
use Illuminate\Support\Facades\Redirect;
// use Illuminate\Support\Facades\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customise()
    {
        return view('customise');
    }

    public function customise_store(Request $request)
    {
        // NAME
        $customised_product_name = CustomisedProduct::create([
            'name' => request('customised_name_input'),
            'user_id' => Auth::id(),
        ]);

        // HEIGHT
        $find_height_attribute = Attribute::where('name', 'height')->first();
        $customised_height_value = AttributeOption::create([
            'value' => request('attribute_height_value'),
            'attributes_id' => $find_height_attribute->id,
        ]);

        // WIDTH
        $find_width_attribute = Attribute::where('name', 'width')->first();
        $customised_width_value = AttributeOption::create([
            'value' => request('attribute_width_value'),
            'attributes_id' => $find_width_attribute->id,
        ]);

        // COLOR
        $find_color_attribute = Attribute::where('name', 'color')->first();
        $customised_color_value = AttributeOption::create([
            'value' =>request('attribute_color_value'),
            'attributes_id' => $find_color_attribute->id,
        ]);

        //BORDER
        $find_border_attribute = Attribute::where('name', 'border')->first();
        $customised_border_value = AttributeOption::create([
            'value' =>request('attribute_border_value'),
            'attributes_id' => $find_border_attribute->id,
        ]);

        // BORDER COLOR
        $find_bordercolor_attribute = Attribute::where('name', 'border_color')->first();
        $customised_bordercolor_value = AttributeOption::create([
            'value' =>request('attribute_bordercolor_value'),
            'attributes_id' => $find_bordercolor_attribute->id,
        ]);

        // BORDER RADIUS
        $find_borderradius_attribute = Attribute::where('name', 'border_radius')->first();
        $customised_borderradius_value = AttributeOption::create([
            'value' =>request('attribute_borderradius_value'),
            'attributes_id' => $find_borderradius_attribute->id,
        ]);

        $data = compact('customised_height_value','customised_width_value',
            'customised_color_value', 'customised_bordercolor_value', 'customised_borderradius_value',
            'customised_border_value');

        return view('customise', compact('customised_height_value','customised_width_value',
            'customised_color_value', 'customised_bordercolor_value', 'customised_borderradius_value',
            'customised_border_value', 'data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configurator');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_product = Product::create([
            'color' => request('color-picker'),
            'height' => request('height-picker'),
            'width' => request('width-picker'),
            // user_id to be corrected
            'user_id' => Auth::id(),
        ]);

        return view('configurator')->with('new_product', $new_product)
            ->with('success','Product has been created!');
    }

    public function personalise()
    {
        return view('personalise');
    }

    public function personalise_add_attributes(Request $request)
    {
        $attribute_names = $_POST['attributename'];
        $attribute_types = $_POST['attributetype'];

        $myarray = array();
        $i = count($attribute_names);
        for($x =0; $x < $i; $x++) {
            $myarray += [$attribute_names[$x]=>$attribute_types[$x]];
            if (DB::table('attributes')->where('name', $attribute_names[$x])->first()) {
                //
            } else {
            Attribute::create([
                'name' => strtolower($attribute_names[$x]),
                'type' => strtolower($attribute_types[$x]),
                ]);
            }
        };
        return view('show_personaliser', compact('myarray'));
        //return Redirect::route('ProductsController@personalise_create_form')->with('myarray', $myarray);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function personalise_create_update()
    {
        // $actions = $request->route()->getAction();
        $post_names = array_keys($_POST);

        $my = array();
        $i = count($post_names);
        for($x =1; $x < $i; $x++) {
            $my += [$post_names[$x]=>$_POST[$post_names[$x]]];
            $find_id = Attribute::where('name', $post_names[$x])->firstOrFail();
            AttributeOption::create([
                'value' => $_POST[$post_names[$x]],
                'attributes_id' => $find_id->id,
            ]);
        }

        return view('show_personaliser')->with('my', $my);
    }

    public function personalise_create()
    {
        // return view('show_personaliser');
    }

}




















//
