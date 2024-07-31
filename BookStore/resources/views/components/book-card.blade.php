<div class="book-card-container">
    <img id="book-cover-image" src="{{ asset('book_cover_image.jpg') }}" alt="">
    <div class="book-card-information">
        <h3 id="book-title">{{ $bookDTO->getBook()->title }}</h3>
        {{--format the book's authors--}}
        @php($authors = $bookDTO->getAuthors())
        <p id="book-authors">
            by
            @foreach($authors as $author)
                {{ $author->author_name}} ({{$author->role}})
                @if(!$loop->last)
                    ,
                @endif
            @endforeach
        </p>
        {{--format the book's prices--}}
        <p id="book-prices">
            {{--get the lowest and the highest price--}}
            @php($bookFormats = $bookDTO->getBookFormats())
            @php($lowestPrice = PHP_INT_MAX)
            @php($highestPrice = PHP_INT_MIN)
            @foreach($bookFormats as $bookFormat)
                @if($bookFormat->price < $lowestPrice)
                    @php($lowestPrice = $bookFormat->price)
                @endif
                @if($bookFormat->price > $highestPrice)
                    @php($highestPrice = $bookFormat->price)
                @endif
            @endforeach
            From {{ $lowestPrice }}đ to {{ $highestPrice }}đ
        </p>
        <button>Add to cart</button>
    </div>
</div>
