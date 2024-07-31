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

<div class="book-card-container">
    <img id="book-cover-image" src="{{ asset('book_cover_image.jpg') }}" alt="">
    <div class="book-card-information">
        <h3 id="book-title">{{ $book->title }}</h3>
        <p id="book-authors">
            by {{ $authorsName }}
        </p>
        <p id="book-prices">
            from {{ $lowestPrice }}đ to {{ $highestPrice }}đ
        </p>
        <button>Add to cart</button>
    </div>
</div>




