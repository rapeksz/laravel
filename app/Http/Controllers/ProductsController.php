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


class ProductsController extends Controller
{
    // Create attributes - forms
    public function personalise()
    {
        return view('personalise');
    }

    // Create attributes - send to DB
    public function personalise_add_attributes(Request $request)
    {
        // Getting all values with name 'attributename' sent by POST
        $attribute_names = $_POST['attributename'];
        // Getting all values with name 'attributetype' sent by POST
        $attribute_types = $_POST['attributetype'];
        $myarray = array();
        $i = count($attribute_names);
        for($x =0; $x < $i; $x++) {
            $myarray += [strtolower($attribute_names[$x])=>strtolower($attribute_types[$x])];
            Attribute::create([
                'name' => strtolower($attribute_names[$x]),
                'type' => strtolower($attribute_types[$x]),
                ]);
        };
        return view('test_show_personaliser', compact('myarray'));
        // return view('show_personaliser', compact('myarray'));
    }

    // Create product and attribute values - send to DB
    public function personalise_create_update(Request $request)
    {
        $product_name = $request->input('personalised_name');
        CustomisedProduct::create([
            'name' => request('personalised_name'),
            'user_id' => Auth::id(),
        ]);

        // all keys from $_POST array
        $post_names = array_keys($_POST);

        $my = array();
        $i = count($post_names);

        // follow all keys from $_POST array except token = 0 and name = 1
        for($x = 2; $x < $i; $x++) {
            $my += [strtolower($post_names[$x])=>strtolower($_POST[$post_names[$x]])];
            $find_id = Attribute::where('name', $post_names[$x])->orderBy('created_at','desc')->firstOrFail();
            $attribute_option = AttributeOption::create([
                'value' => $_POST[$post_names[$x]],
                'attributes_id' => $find_id->id,
            ]);
            $attribute_option->customisedProduct()->attach(CustomisedProduct::where('name', $request->input('personalised_name'))->first());
        }

        return view('show_personaliser')->with('my', $my)->with('product_name', $product_name)
            ->with('success', 'Product has been created!');
    }

    public function test_personalise()
    {
        $post_names = array_keys($_POST);
        $i = $post_names.length;
        return view('test_final_view')->with('post_names', $post_names);

    }

}




















//
