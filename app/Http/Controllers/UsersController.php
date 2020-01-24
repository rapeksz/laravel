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
    /*
        Show all user's products
    */
    public function show_allproducts()
    {
        $user = Auth::user();
        $userProducts = CustomisedProduct::where('user_id', $user->id)->get();
        return view('my_products', compact('user', 'userProducts'));
    }

    /*
        Show single product
    */
    public function show_personalised_product($id)
    {
        $product = CustomisedProduct::find($id);
        // get product's attribute options
        $productValues = $product->attributeOption;
        return view('personalised_product', compact('product', 'productValues'));
    }

    /*
        Update single product
    */
    public function update_product(Request $request, $id)
    {
        $updateProduct = CustomisedProduct::find($id);
        $updateProduct->name = request('personalised_name');
        $updateProduct->save();

        // get product's attribute options - one to many relationship
        $productValues = $updateProduct->attributeOption;
        // $_POST array keys sent by POST
        $postNames = array_keys($_POST);
        $i = count($postNames);
        // starting from x = 3, $_POST[$postNames[3] - our first attribute
        $x = 3;

        // updating in db - foreach old option value get new
        foreach ($productValues as $value) {
            if ($x < count($postNames)) {
                // $_POST[$postNames[$x] = starting from [3] which is our first attribute
                $value->value = $_POST[$postNames[$x]];
                $value->save();
                $x++;
            } else {
                break;
            }
        }
        return redirect('myaccount/products');
    }

    /*
        Delete single product
    */
     public function delete_product($id)
     {
         $product = CustomisedProduct::find($id)->delete();
         return redirect('/myaccount/products');
     }
}
