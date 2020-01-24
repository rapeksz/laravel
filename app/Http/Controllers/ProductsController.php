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
    /*
        Create attributes - show forms
    */
    public function personalise()
    {
        return view('personalise');
    }

    /*
        Create attributes - send to DB
    */
    public function personalise_add_attributes(Request $request)
    {
        // Getting all values with name 'attributename' sent by POST
        $attributeNames = $_POST['attributename'];
        // Getting all values with name 'attributetype' sent by POST
        $attributeTypes = $_POST['attributetype'];
        // Associative array for storing attributes - name => type
        $newArray = array();
        $i = count($attributeNames);
        // Creating attributes and associative array needed for test_show_personaliser view
        for($x = 0; $x < $i; $x++) {
            $newArray += [strtolower($attributeNames[$x])=>strtolower($attributeTypes[$x])];
            Attribute::create([
                'name' => strtolower($attributeNames[$x]),
                'type' => strtolower($attributeTypes[$x]),
                ]);
        };
        return view('test_show_personaliser', compact('newArray'));
    }

    /*
        Create product and attribute values - send to DB
    */
    public function test_personalise(Request $request)
    {
        CustomisedProduct::create([
            'name' => request('personalised_name'),
            'user_id' => Auth::id(),
        ]);

        // $_POST array keys sent by POST
        $attributes = array_keys($_POST);
        $amount = count($attributes);
        // Getting attributes, omitting 2 parametres sent by POST -> token = 0 and personalised_name = 1
        for ($x = 2; $x < $amount; $x++) {

            $lastAttribute = Attribute::where('name', $attributes[$x])->orderBy('created_at','desc')->firstOrFail();
            // if attribute option is array
            if (is_array($_POST[$attributes[$x]])) {
                // foreach attribute option create option in DB
                foreach ($_POST[$attributes[$x]] as $value) {
                    $attributeValue = AttributeOption::create([
                        'value' => $value,
                        'attributes_id' => $lastAttribute->id,
                    ]);
                // assign product to attribute option
                $attributeValue->customisedProduct()->attach(CustomisedProduct::where('name', $request->input('personalised_name'))->first());
                }
            // if attribute option is not array
            } else {
                // create option in DB
                $attributeValue = AttributeOption::create([
                    'value' => $_POST[$attributes[$x]],
                    'attributes_id' => $lastAttribute->id,
                ]);
                $attributeValue->customisedProduct()->attach(CustomisedProduct::where('name', $request->input('personalised_name'))->first());
            }
        }
        // take latest created attributes
        $getAttributes = Attribute::orderBy('id', 'desc')->take($amount-2)->get();
        // take last product
        $product = CustomisedProduct::orderBy('id', 'desc')->first();

        return view('test_final_view',compact('product','getAttributes'));
    }

}




















//
