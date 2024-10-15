<?php

namespace App\Livewire\Front;

use App\Repositories\Cart\CartRepositoryInterface;
use Livewire\Attributes\Rule;
use Livewire\Component;

class AddToCard extends Component
{
    public $product;
    #[Rule('required|int|exists:products,id')]
    public $id;

    public function addProduct(CartRepositoryInterface $cart,$id)
    {
        $this->id = $id;
        $this->validate();
        $cart->add($id);
        $this->dispatch('product.added');
    }
    public function render()
    {
        return view('livewire.front.add-to-card');
    }
}
