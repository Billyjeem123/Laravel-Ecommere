<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class CartController extends Controller
{

    public function addToCart(Request $request)
    {
        try {
            $usertoken = request('usertoken');
            $producttoken = request('token');
    
            $addToCart = new Cart();
            $addToCart->token = $producttoken;
            $addToCart->usertoken = $usertoken;

            if($this->checkIfCartExists($usertoken,$producttoken )){
                return redirect()->back()->with('danger', 'Item already exists');
            }
    
            if ($addToCart->save()) {
                return redirect()->back()->with('success', 'Item added successfully');
            } else {
                return redirect()->back()->with('danger', 'Failed to add item');
            }
        } catch (\Exception $e) {
            // Log the error or handle it appropriately
            return redirect()->back()->with('danger', 'An error occurred: ' . $e->getMessage());
        }finally{
            unset($addToCart);
        }
    }
    
   



    public function getAllCartItems(){

          $usertoken= 123;
        $cartitems =  Cart::where('usertoken', $usertoken)->get();

        foreach ($cartitems as $key => $value) {
            # code...

            // echo $value->productImages[0];
        }
        
        return view('cart',  ['cartitems' => $cartitems]);

    }

    public function checkIfCartExists($usertoken, $producttoken)
    {
                $cart = Cart::where('usertoken', $usertoken)
                ->where('token', $producttoken)
                ->exists();

        return $cart; // This will return the matched cart if found, otherwise null
    }
}

