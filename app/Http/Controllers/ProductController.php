<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cart;
use App\Product;
use App\Http\Requests;
use Session;
use Conekta;
use Conekta_Charge;

class ProductController extends Controller
{
    public function getIndex()
    {
    	$products  = Product::all();
    	return view('shop.index', ['products' => $products]);
    }

    public function getAddToCart(Request $requests, $id)
    {
    	$product = Product::find($id);
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->add($product, $product->id);

    	$requests->session()->put('cart', $cart);
    	return redirect()->route('product.index');
    }

    public function getCart()
    {
    	if(!Session::has('cart')){
    		return view('shop.shopping-cart', ['products' => null]);
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout()
    {
        if(!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout', ['total' => $total]);
    }

    public function postCheckout(Request $requests)
    {
        if(!Session::has('cart')){
            return redirect()->route('product.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        Conekta::setApiKey('key_3Ls291yPd7vsTqBMbzr7qw');
        try {
            $charge = Conekta_Charge::create(array(
                "amount"=> $cart->totalPrice * 100,
                "currency"=> "MXN",
                "description"=> "Test Charge",
                "card"=> $requests->input('conektaTokenId'),
                'details'=> array(
                    'name'=> $requests->input('card-name'),               
                    'email'=> 'contacto@softcoders.mx',
                    'phone'=> '5555555555',
                    'line_items'=> array(
                        array(
                            'name'=> 'Producto de prueba',
                            'description'=> 'Producto E-commerce',
                            'unit_price'=> 10,
                            'quantity'=> 1,
                            'sku'=> 'shc-00001'
                        )
                    )
                )
            ));
        } catch (Conekta_Error $e) {
            //echo $e->getMessage(); //Dev Message            
            return redirect()->route('checkout')->with('error', $e->message_to_purchaser);
        }

        Session::forget('cart');
        return redirect()->route('product.index')->with('success', 'Successfully purchased products!');
    }
}
