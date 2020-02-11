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
        $storedItem['price'] = $item->amount * $storedItem['qty'];   //  Multiplies the price * the quantity of items
        $this->items[$id] = $storedItem;   //  Store the new item in this group
        $this->totalQty++;  //  Increase overall quantity
        $this->totalPrice += $storedItem['price'];  //  Totalprice + the item price

        session()->put('cart', $this);
    }

    public function update($id, $item){
        $cart = Session::get('cart');
        $qty = (int)$_GET['changeQty'];

        if($qty == 0) {
            $this->totalQty -= $quantity;
            $this->totalPrice -= $item['amount'];
            unset($this->items[$id]);
        } else {
            if($qty < $this->items[$id]['qty']) {
                $this->totalQty -= $qty;
                $this->totalPrice -= $item['amount'];
                $this->items[$id]['qty'] -= $qty;
                $this->items[$id]['price'] -= $item['amount'];
                session()->put('cart', $this);            
            } else {
                $this->totalQty += $qty;
                $this->totalPrice += $item['amount'];
                $this->items[$id]['qty'] += $qty;
                $this->items[$id]['price'] += $item['amount'];
                sesstion()->put('cart', $this);
            }
        }

        session()->put('cart', $cart);
    }

    public function removeItem($id){
        $products = session()->get($id);
        unset($this->items[$id]);
        session()->put('cart', $products);
    }

    public function removeCart(){
        session()->flush();
    }
}