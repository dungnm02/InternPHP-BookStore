<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookFormat;
use App\Services\DiscountService;
use App\Services\ServiceImpl\DiscountServiceImpl;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    private DiscountService $discountService;

    public function __construct(DiscountServiceImpl $discountService)
    {
        $this->discountService = $discountService;
    }

    /**
     * Get the cart
     * @return array
     */
    public function getCart()
    {
        return session()->get('cart');
    }


    /**
     * @param Request $request
     * @return void
     */
    public function addCart(Request $request)
    {
        $bookId = $request->input('book_id');
        $quantity = $request->input('quantity');
        $bookFormatId = $request->input('book_format_id');

        // Check if the book is already in the cart
        if ($this->checkIfBookExistsInCart($bookFormatId)) {
            // update the quantity instead
            $cart = session()->get('cart');
            for ($i = 0; $i < count($cart); $i++) {
                if ($cart[$i]['book_format_id'] == $bookFormatId) {
                    $cart[$i]['quantity'] += $quantity;
                }
            }
            session()->put('cart', $cart);
            return;
        }

        if ($quantity === null && $bookFormatId === null) {
            // When adding a book to cart from the home page
            $quantity = 1;
            $bookFormat = BookFormat::where('book_id', $bookId)->first();
        } else {
            // When adding a book to cart from the book details page - can specify quantity and format
            $bookFormat = BookFormat::find($bookFormatId);
        }

        // Apply discount
        $discount = $this->discountService->getAppliableDiscount($bookFormat->id);
        if ($discount == null) {
            $discountedPrice = 0;
        } else {
            $discountedPrice = $bookFormat->price - ($bookFormat->price * $discount->discount_percentage / 100);
        }

        // Package the order details
        $orderDetails = [
            'book_format_id' => $bookFormatId,
            'quantity' => $quantity,
            'price' => $bookFormat->price,
            'discount_price' => $discountedPrice
        ];

        // Check if order already exists
        if (!session()->has('cart')) {
            session()->put('cart', []);
        }

        $cart = session()->get('cart');
        $cart[] = $orderDetails;
    }

    /**
     * Handle updating the cart - quantity
     * @param Request $request
     * @return void
     */
    public function updateCart(Request $request)
    {
        $bookFormatId = $request->input('book_format_id');
        $newQuantity = $request->input('quantity');

        // Get the current order details of this book & update the quantity
        $cart = session()->get('cart');
        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]['book_format_id'] == $bookFormatId) {
                $cart[$i]['quantity'] = $newQuantity;
            }
        }
        session()->put('cart', $cart);
    }


    public function removeBookFromCart(Request $request)
    {
        $bookFormatId = $request->input('format_id');
        $cart = session()->get('cart');
        $newCart = [];
        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]['book_format_id'] != $bookFormatId) {
                $newCart[] = $cart[$i];
            }
        }
        session()->put('cart', $newCart);
    }

    /**
     * Check if the book is already in the cart
     * @param $bookFormatId
     * @return bool
     */
    private function checkIfBookExistsInCart($bookFormatId): bool
    {
        $cart = session()->get('cart');
        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]['book_format_id'] == $bookFormatId) {
                return true;
            }
        }
        return false;
    }

}
