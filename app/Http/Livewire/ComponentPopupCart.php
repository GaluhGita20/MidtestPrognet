<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;
use Auth;

class ComponentPopupCart extends Component
{
    public $carts;
    public $jmlh_cart=0;
    public $total_tagihan=0;
    public $total_item=0;
    public $total_weight=0;
    public function render()
    {
        if(Auth::guest()){
            $this->jmlh_cart=0;
        }else{
            $user = Auth::user();
            $this->carts = Cart::with('product', 'product.product_images')->where([['user_id', '=', $user->id],['status','=', 'aktif']])->get();
            foreach($this->carts as $dd){
                $this->total_tagihan = $this->total_tagihan + $dd->sub_total;
                $this->total_item = $this->total_item + 1;
                $this->total_weight = $this->total_weight + ($dd->product->weight*$dd->qty);
            }
            $this->jmlh_cart = count($this->carts);
        }
        
        
        return view('livewire.component.component-popup-cart');
    }
}
