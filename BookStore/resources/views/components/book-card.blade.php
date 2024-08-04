@php
    {{
        // Format authors name
        $authors = $book->authors;
        $authorsName = "";
        for ($i = 0; $i < count($authors); $i++) {
            $authorsName .= $authors[$i]->author_name . " (" . $authors[$i]->pivot->role . ")";
            if ($i != count($authors) - 1) {
                $authorsName .= ", ";
            }
        }

        // Calculate the lowest and the highest price of the book formats
        $lowestPrice = PHP_INT_MAX;
        $highestPrice = PHP_INT_MIN;
        foreach ($book->formats as $format) {
            if ($format->pivot->price < $lowestPrice) {
                $lowestPrice = $format->pivot->price;
            }
            if ($format->pivot->price > $highestPrice) {
                $highestPrice = $format->pivot->price;
            }
        }
    }}
@endphp

<div class="book-card-container" data-book-id="{{ $book->id }}">
    <img src="{{ asset('book_cover_image.jpg') }}" alt="">
    <a href="{{ route('getBookDetails', ['bookId' => $book->id]) }}">
        <h3 class="book-title">{{ $book->title }}</h3>
    </a>
    <h4>
        by {{ $authorsName }}
    </h4>
    <p>
        from {{ $lowestPrice }}đ to {{ $highestPrice }}đ
    </p>
    <form action="{{ route('addCart') }}" method="POST">
        @csrf
        <input type="hidden" name="book_id" value="{{ $book->id }}">
        <input type="hidden" name="quantity" value="1">
        <button type="submit">Add to cart</button>
    </form>
</div>




