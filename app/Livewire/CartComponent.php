<?php

namespace App\Livewire;

use App\Models\Coupon;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public $haveCouponCode;
    public $couponCode;
    public $discount;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;

    public function mount()
    {
        $this->removeMissingProducts(); // Clean up missing products when component is mounted
    }

    public function increaseQuantity($rowId)
    {
        $this->updateQuantity($rowId, 1);
    }

    public function decreaseQuantity($rowId)
    {
        $this->updateQuantity($rowId, -1);
    }

    protected function updateQuantity($rowId, $quantityChange)
    {
        $product = Cart::instance('cart')->get($rowId);
        if ($product) {
            $productExists = Product::find($product->id);
            if ($productExists) {
                $newQty = $product->qty + $quantityChange;
                if ($newQty > 0) {
                    Cart::instance('cart')->update($rowId, $newQty);
                } else {
                    Cart::instance('cart')->remove($rowId);
                    session()->flash('warning', 'Item was removed from cart because quantity cannot be less than one.');
                }
                $this->dispatch('refreshComponent');
            } else {
                Cart::instance('cart')->remove($rowId);
                session()->flash('warning', 'Item was removed from cart because it no longer exists.');
            }
        }
    }

    public function destroy($rowId)
    {
        $this->removeCartItem($rowId);
        $this->dispatch('refreshComponent');

    }

    public function destroyAll()
    {
        foreach (Cart::instance('cart')->content() as $item) {
            $this->removeCartItem($item->rowId);
        }
        Cart::instance('cart')->destroy();
        $this->dispatch('refreshComponent');
        session()->flash('success_message', 'Cart was cleared');
    }

    protected function removeCartItem($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        if ($product) {
            $productExists = Product::find($product->id);
            if ($productExists) {
                Cart::instance('cart')->remove($rowId);
                session()->flash('success_message', 'Item removed');
            } else {
                Cart::instance('cart')->remove($rowId);
                session()->flash('warning', 'Item was removed from cart because it no longer exists.');
            }
        }
    }

    public function applyCouponCode()
    {
        $cartSubtotal = Cart::instance('cart')->subtotal();
        $coupon = Coupon::where('code', $this->couponCode)
            ->where('expiry_date', '>=', Carbon::today())
            ->where('cart_value', '<=', $cartSubtotal)
            ->first();

        if (!$coupon) {
            session()->flash('coupon_message', 'Coupon code is invalid or has expired!');
            return;
        }

        session()->put('coupon', [
            'code' => $coupon->code,
            'type' => $coupon->type,
            'value' => $coupon->value,
            'cart_value' => $coupon->cart_value
        ]);

        $this->calculateDiscount(); // Update discount immediately
    }

    public function calculateDiscount()
    {
        if (session()->has('coupon')) {
            $coupon = session()->get('coupon');
            $cartSubtotal = Cart::instance('cart')->subtotal();

            $this->discount = $coupon['type'] == 'fixed' ? $coupon['value'] : ($cartSubtotal * $coupon['value']) / 100;
            $this->subtotalAfterDiscount = $cartSubtotal - $this->discount;
            $this->taxAfterDiscount = ($this->subtotalAfterDiscount * config('cart.tax')) / 100;
            $this->totalAfterDiscount = $this->subtotalAfterDiscount + $this->taxAfterDiscount;
        }
    }

    public function removeCoupon()
    {
        session()->forget('coupon');
    }

    public function checkout()
    {
        return redirect()->route(Auth::check() ? 'checkout' : 'login');
    }

    public function setAmountForCheckout()
    {
        if (Cart::instance('cart')->count() > 0) {
            $checkoutData = [
                'discount' => session()->has('coupon') ? $this->discount : 0,
                'subtotal' => session()->has('coupon') ? $this->subtotalAfterDiscount : Cart::instance('cart')->subtotal(),
                'tax' => session()->has('coupon') ? $this->taxAfterDiscount : Cart::instance('cart')->tax(),
                'total' => session()->has('coupon') ? $this->totalAfterDiscount : Cart::instance('cart')->total()
            ];

            session()->put('checkout', $checkoutData);
        } else {
            session()->forget('checkout');
        }
    }

    public function removeMissingProducts()
    {
        foreach (Cart::instance('cart')->content() as $item) {
            if (!Product::find($item->id)) {
                Cart::instance('cart')->remove($item->rowId);
                session()->flash('warning', 'Some items were removed from your cart because they are no longer available.');
            }
        }
    }


    public function render()
    {
        $this->removeMissingProducts(); // Ensure the cart is cleaned of missing products

        if (session()->has('coupon')) {
            $cartSubtotal = Cart::instance('cart')->subtotal();
            if ($cartSubtotal < session()->get('coupon')['cart_value']) {
                session()->forget('coupon');
            } else {
                $this->calculateDiscount();
            }
        }

        $this->setAmountForCheckout();

        if (Auth::check()) {
            Cart::instance('cart')->store(Auth::user()->email);
        }

        return view('livewire.cart-component')->layout('components.layouts.others');
    }
}
