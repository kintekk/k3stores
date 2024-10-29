<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Cart;

class CheckoutController extends Controller
{
    public function callback(Request $request) 
    {
        DB::beginTransaction();

        try {
            // Check if user is authenticated
            if (!Auth::check()) {
                return redirect()->route('checkout')->with('error', 'You are not logged in.');
            }
    
            $response = $request->all();
    
            // Log the response for debugging purposes
            \Log::info('Flutterwave Callback Response: ', $response);
    
            // Validate response status
            if (!isset($response['status'])) {
                throw new \Exception('Invalid response data: No status found');
            }
    
            // Retrieve transaction reference from the response
            $tx_ref = $response['tx_ref'] ?? null; 
            $order = Order::where('tx_ref', $tx_ref)->first();
    
            if (!$order) {
                throw new \Exception('Order not found for the provided transaction reference');
            }
    
            // Check for successful transaction
            if ($response['status'] === 'completed') { // Assuming 'completed' is Flutterwave's response for success
    
            
    
                // Save transaction details
                $transaction = new Transaction();
                $transaction->user_id = $order->user_id;
                $transaction->order_id = $order->id;
                $transaction->mode = 'card';
                $transaction->status = 'approved'; 
                $transaction->save();
    
                // Clear the cart and session data
                Cart::instance('cart')->destroy(); // Clears the cart
                session()->forget('checkout'); // Clears the session
    
                \Log::info('Cart cleared and checkout session forgotten.');
    
                // Send order confirmation email
                Mail::to($order->email)->send(new OrderMail($order));
                \Log::info('Order confirmation email sent to: ' . $order->email);
    
                DB::commit();
                \Log::info('Database transaction committed.');
    
                return redirect()->route('thankyou');
    
            } elseif ($response['status'] === 'cancelled') {
                // Update order status to cancelled
                $order->status = 'cancelled';
                $order->save();
                DB::rollBack();
                return redirect()->route('checkout')->with('error', 'Your transaction was cancelled');
    
            } else {
                // Handle any other status as an error
                $order->status = 'failed';
                $order->save();
                DB::rollBack();
                return redirect()->route('checkout')->with('error', 'Something went wrong, please try again');
            }
    
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Callback Error: ' . $e->getMessage());
            return redirect()->route('checkout')->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
