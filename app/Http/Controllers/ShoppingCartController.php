<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    public static $menu_parent = 'shopping_cart';

    public function show(){
        $shoppingCart = null;
        if (Session::has('shoppingCart')){
            $shoppingCart = Session::get('shoppingCart');
        } else {
            $shoppingCart = [];
        }
        return view('cart', [
            'shoppingCart'=>$shoppingCart
        ]);
    }
    public function add(Request $request)
    {
        $productId = $request->get('id');
        $productQuantity = $request->get('quantity');
        if ($productQuantity <= 0){
            return view('admin.errors.404', [
                'msg' => 'Số lượng sản phẩm cần lớn hơn 0',
                'menu_parent' => self::$menu_parent,
                'menu_action' => 'create'
            ]);
        }
        $obj = Product::find($productId);
        if ($obj == null){
            return view('admin.errors.404', [
                'msg' => 'Không tìm thấy sản phẩm',
                'menu_parent' => self::$menu_parent,
                'menu_action' => 'create'
            ]);
        }
        $shoppingCart = null;
        if (Session::has('shoppingCart')){
            $shoppingCart = Session::get('shoppingCart');
        } else {
            $shoppingCart = [];
        }
        if (array_key_exists($productId, $shoppingCart)){
            $existingCartItem = $shoppingCart[$productId];
            $existingCartItem->quantity += $productQuantity;
            $shoppingCart[$productId] = $existingCartItem;
        } else {
            $cartItem = new stdClass();
            $cartItem->id = $obj->id;
            $cartItem->name = $obj->name;
            $cartItem->unitPrice = $obj->price;
            $cartItem->quantity = $productQuantity;
            $shoppingCart[$productId] = $cartItem;
        }
        Session::put('shoppingCart', $shoppingCart);
        return redirect('/cart/show');
    }

    public function update(Request $request){
        $productId = $request->get('id');
        $productQuantity = $request->get('quantity');
        if ($productQuantity <= 0){
            return view('admin.errors.404', [
                'msg' => 'Số lượng sản phẩm cần lớn hơn 0',
                'menu_parent' => self::$menu_parent,
                'menu_action' => 'create'
            ]);
        }
        $obj = Product::find($productId);
        if ($obj == null){
            return view('admin.errors.404', [
                'msg' => 'Không tìm thấy sản phẩm',
                'menu_parent' => self::$menu_parent,
                'menu_action' => 'create'
            ]);
        }
        $shoppingCart = null;
        if (Session::has('shoppingCart')){
            $shoppingCart = Session::get('shoppingCart');
        } else {
            $shoppingCart = [];
        }
        if (array_key_exists($productId, $shoppingCart)){
            $existingCartItem = $shoppingCart[$productId];
            $existingCartItem->quantity += $productQuantity;
            $shoppingCart[$productId] = $existingCartItem;
        } else {
            $cartItem = new stdClass();
            $cartItem->id = $obj->id;
            $cartItem->name = $obj->name;
            $cartItem->unitPrice = $obj->price;
            $cartItem->quantity = $productQuantity;
            $shoppingCart[$productId] = $cartItem;
        }
        Session::put('shoppingCart', $shoppingCart);
        return redirect('/cart/show');
    }

    public function remove(Request $request)
    {
        $productId = $request->get('id');
        $shoppingCart = null;
        if (Session::has('shoppingCart')){
            $shoppingCart = Session::get('shoppingCart');
        } else {
            $shoppingCart = [];
        }
        unset($shoppingCart[$productId]);
        Session::put('shoppingCart', $shoppingCart);
        return redirect('/cart/show');
    }
}

