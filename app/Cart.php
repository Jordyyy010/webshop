<?php

namespace App;

use Session;

use Illuminate\Database\Eloquent\Model;

class Cart
{
    public $items = null;   //  Makes a group of the same items
    public $totalQty = 0;   //  Total quantity
    public $totalPrice = 0;     //  Total price

    public function __construct() {
        $oldCart = Session::get('cart');        //  waar staan de :: voor
        if($oldCart){   //  If there is an old cart made, copy the last cart details
            $this->items = $oldCart->items;     // Wat betekend $this 
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        } else {
            return view('products.index', ['products' => null]);
        }
    }

    public function add($item, $id) {
        $storedItem = ['qty' => 0, 'price' => $item->amount, 'item' => $item];  //  New item data
        if($this->items) {      //  Are there any items in the cart
            //  If the id of $this->items have the same id as other id that already has been stored
            //  The next item can be stored in the same $items variable so yo get a group of the same items
            //  with a quantity of that product
            if(array_key_exists($id, $this->items)) {   //  If item already exist
                $storedItem = $this->items[$id];   //  Overwrite the data from the existing item
            }
        }
        $storedItem['qty']++;   //  Added new item, quantity increases
        $storedItem['price'] = $item->amount * 1;   //  Multiplies the price * the quantity of items
        $this->items[$id] = $storedItem;   //  Store the new item in this group
        $this->totalQty++;  //  Increase overall quantity
        $this->totalPrice += $storedItem['price'];  //  Totalprice + the item price

    
        Session::put('cart', $this);
    }

    public function update($id, $newQty){
        $cart = Session::get('cart');

        $lessQty = $this->items[$id]['qty'] -= $newQty;
        $moreQty = $newQty -= $cart->items[$id]['qty'];
        $lessTotal = $this->items[$id]['price'] * $lessQty;
        $moreTotal = $this->items[$id]['price'] * $moreQty;

        if($newQty == 0) {
            $cart->totalQty -= $lessQty;
            $cart->totalPrice -= $lessTotal;
            unset($cart->items[$id]);
            Session::put('cart', $cart);
        } else {
            if($cart->items[$id]['qty'] > $newQty) {
                $cart->totalQty -= $lessQty;
                $cart->totalPrice -= $lessTotal;
                $cart->items[$id]['qty'] -= $lessQty;
                Session::put('cart', $cart);
            } else {
                $cart->totalQty += $moreQty;
                $cart->totalPrice += $moreTotal;
                $cart->items[$id]['qty'] += $moreQty;
                Session::put('cart', $cart);
            }
        }
        if($cart->totalQty <= 0){
            Session::flush();
        }
    }

    public function removeItem($id){
        $cart = Session::get('cart');
        unset($cart->items[$id]);
        $itemTotal = $this->items[$id]['price'] * $this->items[$id]['qty'];
        $cart->totalPrice -= $itemTotal;
        $cart->totalQty -= $this->items[$id]['qty'];
        if($cart->totalQty <= 0){
            Session::flush();
        } else {
            Session::put('cart', $cart);
        }
    }

    public function removeCart(){
        Session::flush();
    }
}