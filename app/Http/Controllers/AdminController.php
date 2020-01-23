<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\CustomisedProduct;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // Admin panel
    public function index()
    {
        return view('admin.panel');
    }

    // Show all created products
    public function show_products()
    {
        $products = CustomisedProduct::get();
        return view('admin.products')->with('products', $products);
    }

    // Show single product
    public function show_product($id)
    {
        $show_product = Product::find($id);
        return view('admin.product')->with('show_product', $show_product);
    }

    // All users
    public function show_users()
    {
        $users = User::get();
        return view('admin.users')->with('users', $users);
    }

    // Single user
    public function show_user($id)
    {
        $user = User::find($id);
        return view('admin.show_user')->with('user', $user);
    }

    // Creating user - form
    public function create_user_form()
    {
        return view('admin.create_user');
    }

    // Create user - send data to DB
    public function create_user_db(Request $request)
    {
        $new_user = User::create([
            'name' => request('newuser_name'),
            'email' => request('newuser_email'),
            'password' => bcrypt(request('newuser_password')),
        ]);

        $new_user->roles()->attach(Role::where('name','User')->first());

        return view('admin.create_user')->with('success', 'User has been created!');
    }

    // Delete user - update DB
    public function delete_user($id)
    {
        User::find($id)->delete();
        return redirect('admin/users');
    }

    // Update user info in DB
    public function update_user(Request $request, $id)
    {
        $update_user = User::find($id);
        $update_user->name = request('newuser_name');
        $update_user->email = request('newuser_email');
        $update_user->password = bcrypt(request('newuser_password'));
        $update_user->save();

        return view('admin.create_user')->with('success', 'User data has been updated!');

    }

}
