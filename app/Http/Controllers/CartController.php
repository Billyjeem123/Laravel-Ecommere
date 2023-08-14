<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class CartController extends Controller {

    public function addToCart( Request $request ) {
        try {
            $usertoken = request( 'usertoken' );
            $producttoken = request( 'token' );
            $quantity = request( 'quantity' );

            $addToCart = new Cart();
            $addToCart->token = $producttoken;
            $addToCart->usertoken = $usertoken;
            $addToCart->quantity = $quantity;

            if ( $this->checkIfCartExists( $usertoken, $producttoken ) ) {
                return redirect()->back()->with( 'danger', 'Item already exists' );
            }

            if ( $addToCart->save() ) {
                return redirect()->back()->with( 'success', 'Item added successfully' );
            } else {
                return redirect()->back()->with( 'danger', 'Failed to add item' );
            }
        } catch ( \Exception $e ) {
            // Log the error or handle it appropriately
            return redirect()->back()->with( 'danger', 'An error occurred: ' . $e->getMessage() );
        }
        finally {
            unset( $addToCart );
        }
    }

    public function getAllCartItems() {

        $usertoken = 123;
        $cartitems =  Cart::where( 'usertoken', $usertoken )->get();

        $message = ( $cartitems->isEmpty() ) ? 'No items found.' : '';
        return view( 'cart', [ 'cartitems' => $cartitems, 'message' => $message ] );

    }

    public function checkIfCartExists( $usertoken, $producttoken ) {
        $cart = Cart::where( 'usertoken', $usertoken )
        ->where( 'token', $producttoken )
        ->exists();

        return $cart;
        // This will return the matched cart if found, otherwise null
    }

    public function removeCart(Request $request) {
        try {

            $carttoken = $request->token;
            
            $cartitem = Cart::where('token', $carttoken)
                             ->where('usertoken', 123)
                             ->first();
    
            if (!$cartitem) {
                return back()->with('danger', 'Cart item not found.');
            }
    
            $deleted = $cartitem->delete();
    
            if ($deleted) {
                return back()->with('success', 'Cart item deleted.');
            } else {
                return back()->with('danger', 'Failed to delete cart item.');
            }
    
        } catch (\Exception $e) {
            return back()->with('danger', 'An error occurred while deleting the cart item.');
        }
    }

    public function increaseQuant(Request $request) {
        try {
            Cart::where('usertoken', 123)
                ->where('token', $request->token)
                ->increment('quantity');
                
            return back()->with('success', 'Cart item quantity increased.');
        } catch (\Exception $e) {
            return back()->with('danger', 'Failed to increase cart item.'. $e->getMessage());
        }
    }
        

}

