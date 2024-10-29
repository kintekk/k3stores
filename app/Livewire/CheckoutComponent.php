<?php

namespace App\Livewire;

use App\Models\Billing;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Flutterwave\Payments\Facades\Flutterwave;
use Flutterwave\Payments\Data\Currency;
use Cart;

class CheckoutComponent extends Component
{
    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $line1;
    public $city;
    public $province;
    public $states = []; // Initialize as an empty array
    public $thankyou;
    public $country = "Nigeria";

    public function mount()
    {
        if (Auth::check()) {
            $billing = Billing::where('user_id', Auth::user()->id)->first();
            if ($billing) {
                $this->firstname = $billing->firstname;
                $this->lastname = $billing->lastname;
                $this->mobile = $billing->mobile;
                $this->city = $billing->city;
                $this->province = $billing->province;
                $this->line1 = $billing->line1;
            }

            $this->states = [
                'Abia', 'Adamawa', 'Akwa Ibom', 'Anambra', 'Bauchi', 'Bayelsa', 'Benue',
                'Borno', 'Cross River', 'Delta', 'Ebonyi', 'Edo', 'Ekiti', 'Enugu',
                'Gombe', 'Imo', 'Jigawa', 'Kaduna', 'Kano', 'Katsina', 'Kebbi',
                'Kogi', 'Kwara', 'Lagos', 'Nasarawa', 'Niger', 'Ogun', 'Ondo',
                'Osun', 'Oyo', 'Plateau', 'Rivers', 'Sokoto', 'Taraba', 'Yobe',
                'Abuja'
            ];
        } else {
            return redirect()->route('login');
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'firstname' => 'required',
            'lastname' => 'required',
            'mobile' => 'required|numeric|digits:11', // Ensure proper mobile format
            'line1' => 'nullable',
            'city' => 'required',
            'province' => 'required',
        ]);
    }

    public function billingDetails()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'mobile' => 'required|numeric|digits:11', // Ensure proper mobile format
            'line1' => 'nullable',
            'city' => 'required',
            'province' => 'required',
        ]);

        $billing = Billing::where('user_id', Auth::user()->id)->first();

        if ($billing) {
            // Update existing billing information
            $billing->update([
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'mobile' => $this->mobile,
                'line1' => $this->line1,
                'city' => $this->city,
                'province' => $this->province,
            ]);
            session()->flash('message', 'Details updated successfully, now scroll down and place your order!');
        } else {
            // Save new billing information
            $billing = new Billing();
            $billing->user_id = Auth::user()->id; // user_id is set
            $billing->firstname = $this->firstname;
            $billing->lastname = $this->lastname;
            $billing->email = Auth::user()->email;
            $billing->mobile = $this->mobile;
            $billing->line1 = $this->line1;
            $billing->city = $this->city;
            $billing->province = $this->province;
            $billing->country = $this->country; // Optional
            $billing->save(); // Save the new billing record
            session()->flash('message', 'Details created successfully, now scroll down and place your order!');
        }
    }

    public function initialize()
    {
        // Check billing details
        $billing = Billing::where('user_id', Auth::user()->id)->first();
        if (!$billing) {
            session()->flash('error', 'Billing details are not available.');
            return redirect()->route('product.cart');
        }

        // Ensure subtotal and shipping cost are numeric
        $subtotal = session()->get('checkout')['total'] ?? 0; // Default to 0 if not set
        // Remove commas and convert to float
        $subtotal = (float) str_replace(',', '', $subtotal);
        $shippingCostPerItem = 1500; // Example shipping cost per item
        $itemCount = Cart::instance('cart')->count(); // Get the number of items in the cart
        $shippingCost = is_numeric($itemCount) ? ($shippingCostPerItem * $itemCount) : 0; // Calculate shipping cost

        // Calculate total amount
        $totalAmount = array_sum([$subtotal, $shippingCost]);

        // Prepare the payment payload
        $payload = [
            "tx_ref" => Flutterwave::generateTransactionReference(),
            "amount" => $totalAmount,
            "currency" => Currency::NGN,
            "email" => $billing->email,
            "phone_number" => $billing->mobile,
            "name" => $billing->firstname . ' ' . $billing->lastname,
            "customer" => [
                "email" => $billing->email,
                "phone_number" => $billing->mobile,
                "name" => $billing->firstname . ' ' . $billing->lastname,
            ],
            "redirect_url" => route('pay') , // Use config here config('flutterwave.redirectUrl')
        ];

        // Generate the payment link
        $paymentLink = Flutterwave::render('standard', $payload);
        if ($paymentLink) {
            // Save order details in the database
            $this->createOrder($payload['tx_ref'], $totalAmount);
            return redirect($paymentLink);
        } else {
            session()->flash('error', 'Please refresh the page and try again');
        }
    }

    protected function createOrder($tx_ref, $totalAmount)
    {
        $billing = Billing::where('user_id', Auth::user()->id)->first();
        // Create a new order
          $order = new Order();
          $order->user_id = Auth::user()->id;
          $order->subtotal = floatval(str_replace(',', '', session()->get('checkout')['subtotal']));
          $order->discount = floatval(str_replace(',', '', session()->get('checkout')['discount']));
          $order->tax = floatval(str_replace(',', '', session()->get('checkout')['tax']));
          $order->total = $totalAmount;
          $order->firstname = $billing->firstname;
          $order->lastname = $billing->lastname;
          $order->email = Auth::user()->email;
          $order->mobile = $billing->mobile;
          $order->line1 = $billing->line1;
          $order->city = $billing->city;
          $order->province = $billing->province;
          $order->country = "Nigeria";
          $order->status = "ordered";
          $order->tx_ref = $tx_ref;
          $order->save();

        // Save cart items
        foreach (Cart::instance('cart')->content() as $item) {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->options = $item->options ? serialize($item->options) : null;
            $orderItem->save();
        }

            // Save transaction
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode = 'card';
            $transaction->status = 'pending';
            $transaction->save();
   
    }

    public function verifyForCheckout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } elseif (!session()->get('checkout')) {
            return redirect()->route('product.cart');
        }
    }

    public function hasBillingDetails()
    {
        return Billing::where('user_id', Auth::user()->id)->exists();
    }

    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.checkout-component', [
            'states' => $this->states,
            'hasBillingDetails' => $this->hasBillingDetails()
        ])->layout('components.layouts.others');
    }
}
