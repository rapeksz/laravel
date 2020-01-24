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

        $productValues = $updateProduct->attributeOption;
        $postNames = array_keys($_POST);
        $i = count($postNames);
        $x = 3;

        // foreach option value
        foreach ($productValues as $value) {
            if ($x < count($postNames)) {
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
