<div class="cart-item">
    <img id="cart-book-cover-image" src="{{ asset('img/book-cover-image.jpg') }}" alt="">
    <h3 id="cart-book-title">{{ $cartItem["book_format"]->book->title}}</h3>
    <p id="cart-book-authors"></p>
    {{-- Show the discounted price if discount is applied --}}
    @if($cartItem["discount_amount"] > 0)
        <p id="cart-book-prices">
            @php($discountedPrice = $cartItem["book_format"]->price - $cartItem["discount_amount"])
            <span style="text-decoration: line-through">{{ $cartItem["book_format"]->price }}đ</span>
            {{ $cartItem["book_format"]->price - $cartItem["discount_amount"] }}đ
        </p>
    @else
        {{-- Show the original price --}}
        <p id="cart-book-prices">{{ $cartItem["book_format"]->price }}đ</p>
    @endif
    <input type="number" class="cart-quantity-input" value="{{ $cartItem["quantity"] }}" min="1" max="99" step="1">
    <p id="total-price">{{ $cartItem["book_format"]->price * $cartItem["quantity"] }}đ</p>
    <form action="{{ route('removeCart') }}" method="POST">
        @csrf
        <input type="hidden" name="book_format_id" value="{{ $cartItem['book_format_id'] }}">
        <button type="submit">Remove</button>
    </form>
</div>


