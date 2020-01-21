<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Attribute;
use App\AttributeOption;
use App\CustomisedProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_allproducts()
    {
        $user = Auth::user();
        $user_products = CustomisedProduct::where('user_id', $user->id)->get();
        //$user_products = Product::where('user_id', $user->id)->get();
        return view('my_products', compact('user', 'user_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_product($id)
    {
        $product = Product::find($id);
        return view('product')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_personalised_product($id)
    {
        $product = CustomisedProduct::find($id);
        $product_attributes_option = $product->attributeOption;

        return view('personalised_product', compact('product', 'product_attributes_option'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_product(Request $request, $id)
    {
        $update_product = CustomisedProduct::find($id);
        $update_product->name = request('personalised_name');
        $update_product->save();

        $update_product_values = $update_product->attributeOption;
        $post_names = array_keys($_POST);
        $i = count($post_names);
        $x = 3;

        // foreach option value
        foreach ($update_product_values as $value) {
            if ($x < count($post_names)) {
                $value->value = $_POST[$post_names[$x]];
                $value->save();
                $x++;
            } else {
                break;
            }
        }
        return redirect('myaccount/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function delete_product($id)
     {
         $product = CustomisedProduct::find($id)->delete();
         return redirect('/myaccount/products');
     }
}
