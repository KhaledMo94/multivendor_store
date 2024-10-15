<?php

namespace App\Livewire\Front;

use App\Repositories\Cart\CartDatabase;
use App\Repositories\Cart\CartRepositoryInterface;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Cart extends Component
{
    public $cart;
    public $total;

    public function removeProduct(CartRepositoryInterface $cart , $id)
    {
        $cart->removeProduct($id);
    }

    public function emptyCart(CartRepositoryInterface $cart)
    {
        $cart->empty();
    }

    #[On('product.added')]
    public function render(CartRepositoryInterface $cart)
    {
        $this->cart = $cart->get();
        $this->total =$cart->total();
        return view('livewire.front.cart');
    }
}
