<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{


public function addToCart(Request $request){
$product=Product::find($request->product_id);

Cart::add([
    'id'   => $request->product_id ,
    'name' => $product->product_name,
    'qty'  => $request->qty,
    'price'=> $product->product_price,
    'options' => [
        'image' =>$product->product_image,
    ]
]);

return redirect('/Cart/Show');

}

public  function showCart(){

    $cartProducts = Cart::content();


    return view('front.cart.show-cart',['cartProducts' =>$cartProducts]);



}

public function updateCartQty(Request $request){

//    return $request->all();

    Cart::update($request->rowId, $request->qty);

    return redirect('/Cart/Show');
}

    public function deleteCartProduct($id){



        Cart::remove($id);

        return redirect('/Cart/Show');
    }


}
