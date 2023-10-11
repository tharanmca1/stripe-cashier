<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Auth;

class ProductController extends Controller
{
   
    public function index()
    {
        $products = Product::all(); // Retrieve all products from the database

        return view('product', compact('products'));
    }
    
    public function showProductDetails(Product $product, $price)
    {
        
        $user = Auth::user();
        return view('product-detail', [
            'user'=>$user,
            'intent' => $user->createSetupIntent(),
            'product' => $product,
            'price' => $price
            ]);
    }
    public function processPayment(Request $request, Product $product, $price)
    {
        $user = Auth::user();
        $paymentMethod = $request->input('payment_method');
        $user->createOrGetStripeCustomer();
        $user->addPaymentMethod($paymentMethod);
        try
        {
            $user->charge($price*100, $paymentMethod);
        }
        catch (\Exception $e)
        {
            return back()->withErrors(['message' => 'Error creating subscription. ' . $e->getMessage()]);
        }
        return back()->with(['success' => 'Payment Success']);

    }

}
