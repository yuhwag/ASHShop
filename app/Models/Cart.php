<?php

namespace App\Models;

class Cart
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function add($item, $id){
		$cart = ['qty'=>0, 'price' => 0, 'item' => $item];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$cart = $this->items[$id];
			}
		}
		$cart['qty']++;
        if($item->promotion_price == 0){
            $cart['price'] = $item->unit_price;
        } else {
            $cart['price'] = $item->promotion_price;
        }
		$this->items[$id] = $cart;
		$this->totalQty++;
		$this->totalPrice += $cart['price'];
	}
	//xóa 1
	public function reduceByOne($id){
		$this->items[$id]['qty']--;
		// $this->items[$id]['price'] -= $this->items[$id]['price'];
		$this->totalQty--;
		$this->totalPrice -= $this->items[$id]['price'];
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	//xóa nhiều
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= ($this->items[$id]['price'] * $this->items[$id]['qty']);
		unset($this->items[$id]);
	}
}
