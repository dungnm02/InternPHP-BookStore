<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Handle updating or adding new book to cart
     * @param Request $request
     * @return void
     */
    public function updateCart(Request $request)
    {
        $bookId = $request->input('book_id');
        $quantity = $request->input('quantity');
        $bookFormatId = $request->input('format_id');

        // Set default value if a new book is added
        if ($quantity === null) {
            $quantity = 1;
            $bookFormat = DB::table('book_format')
                ->where('book_id', $bookId)
                ->first();
        } else {
            $bookFormat = DB::table('book_format')
                ->where('book_id', $bookId)
                ->where('format_id', $bookFormatId)
                ->first();
        }

        //Apply discount


        //Pack
        $orderDetails = [
            'book_id' => $bookId,
            'quantity' => $quantity

        ];

        // Check if cart is in session
        if (!session()->has('cart')) {
            session()->put('cart', []);
        }


    }

    public function getCart()
    {

    }

    public function removeFromCart()
    {

    }
}
