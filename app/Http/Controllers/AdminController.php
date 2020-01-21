<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.panel');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function show_products()
    {
        $products = CustomisedProduct::get();
        return view('admin.products')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show_users()
    {
        $users = User::get();
        return view('admin.users')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show_product($id)
    {
        $show_product = Product::find($id);
        return view('admin.product')->with('show_product', $show_product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show_user($id)
    {
        $user = User::find($id);
        return view('admin.show_user')->with('user', $user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create_user_form()
    {
        return view('admin.create_user');

    }

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_product($id)
    {
        DB::table('products')->where('id', $id)->delete();
        return redirect('/admin/products');
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
        $update_product = Product::find($id);
        $update_product->color = request('color-picker');
        $update_product->height = request('height-picker');
        $update_product->width = request('width-picker');
        $update_product->save();
        return redirect('/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_user($id)
    {
        //DB::table('users')->where('id', $id)->delete();
        User::find($id)->delete();
        return redirect('admin/users');
    }

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
