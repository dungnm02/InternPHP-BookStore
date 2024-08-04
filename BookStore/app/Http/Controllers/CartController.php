<?php

namespace App\Http\Controllers;

use App\Models\BookFormat;
use App\Services\DiscountService;
use App\Services\ServiceImpl\DiscountServiceImpl;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class CartController extends Controller
{
    private DiscountService $discountService;

    public function __construct(DiscountServiceImpl $discountService)
    {
        $this->discountService = $discountService;
    }

    /**
     * Get the cart
     * @return View
     */
    public function getCart(): View
    {
        // Create a cart if it doesn't exist
        if (!session()->has('cart')) {
            session()->put('cart', []);
        }
        $cart = session()->get('cart');
        return view('cart', [
            'cart' => $cart
        ]);
    }


    /**
     * Handle adding a book to the cart from home page or book details page
     * @param Request $request
     * @return RedirectResponse
     */
    public function addCart(Request $request): RedirectResponse
    {
        // Create a cart if it doesn't exist
        if (!session()->has('cart')) {
            session()->put('cart', []);
        }
        $cart = session()->get('cart');

        $bookId = $request->input('book_id');
        $quantity = $request->input('quantity');
        $bookFormatId = $request->input('book_format_id');

        // Initialize values if adding from home page (missing book_format_id)
        if ($bookFormatId === null) {
            // Get the first format of the book
            $bookFormat = BookFormat::where('book_id', $bookId)->first();
            $bookFormatId = $bookFormat->id;
        } else {
            // When adding a book to cart from the book details page - can specify quantity and format
            $bookFormat = BookFormat::find($bookFormatId);
        }

        // Check if the book is already in the cart
        if ($this->checkIfBookExistsInCart($bookFormatId)) {
            // Update the quantity instead
            for ($i = 0; $i < count($cart); $i++) {
                if ($cart[$i]['book_format_id'] == $bookFormatId) {
                    $cart[$i]['quantity'] += 1;
                }
            }
            session()->put('cart', $cart);
            return redirect()->route('home');
        }

        // Apply discount if available
        $discount = $this->discountService->getAppliableDiscount($bookFormat->id);
        if ($discount == null) {
            $discountAmount = 0;
        } else {
            $discountAmount = $bookFormat->price - ($bookFormat->price * $discount->discount_percentage / 100);
        }

        // Package the order details with extra information for showing in the cart
        $orderDetails = [
            'book_format_id' => $bookFormatId,
            'quantity' => $quantity,
            'price' => $bookFormat->price,
            'discount_amount' => $discountAmount,
            // Extra details
            'book_format' => $bookFormat,
            'format' => $bookFormat->format,
        ];

        // Add the order details to the cart
        $cart[] = $orderDetails;
        session()->put('cart', $cart);

        return redirect()->route('home');
    }

    /**
     * Handle updating the cart - quantity
     * @param Request $request
     * @return void
     */
    public function updateCart(Request $request): void
    {
        $bookFormatId = $request->input('book_format_id');
        $newQuantity = $request->input('quantity');

        if ($this->checkIfBookExistsInCart($bookFormatId)) {
            // Get the current order details of this book & update the quantity
            $cart = session()->get('cart');
            for ($i = 0; $i < count($cart); $i++) {
                if ($cart[$i]['book_format_id'] == $bookFormatId) {
                    $cart[$i]['quantity'] = $newQuantity;
                }
            }
            session()->put('cart', $cart);
        }
    }

    /**
     * Handle removing a book from the cart
     * @param Request $request
     * @return RedirectResponse
     */
    public function removeCart(Request $request): RedirectResponse
    {
        $bookFormatId = $request->input('book_format_id');
        if ($this->checkIfBookExistsInCart($bookFormatId)) {
            $cart = session()->get('cart');
            $newCart = [];
            for ($i = 0; $i < count($cart); $i++) {
                if ($cart[$i]['book_format_id'] != $bookFormatId) {
                    $newCart[] = $cart[$i];
                }
            }
            session()->put('cart', $newCart);
        }
        return redirect()->route('getCart');
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
