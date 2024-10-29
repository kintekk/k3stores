<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\ProductDeleted;
use Cart;
class RemoveProductFromCart
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductDeleted $event): void
    {
      // Check if the cart has items
      if (Cart::count() > 0) {
        // Remove the product from all user carts
        foreach (Cart::content() as $item) {
            if ($item->id == $event->productId) {
                Cart::remove($item->rowId);
            }
        }
    }
    }
}
