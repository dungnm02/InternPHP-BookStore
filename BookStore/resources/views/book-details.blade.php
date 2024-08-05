<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Details</title>
    <link rel="stylesheet" href="{{ asset('/css/master.css') }}">
</head>
<body>
@extends('layouts.master', ['hasSideBar' => false])
@section('content')
    <div id="main-container">
        <div id="book-container">
            <img id="book-format-cover-image" src="{{asset('img/book-cover-image.jpg')}}" alt="">
            <div id="book-details-container">
                <h1>{{$book->title}}</h1>
                {{--Author is a link that list to book by author page--}}
                <h2>
                    {{-- Authors need formating, should be a link to author page--}}
                    by:
                    @foreach($book->authors as $author)
                        <span>
                            <a href="#">
                                {{$author->author_name}}
                            </a>
                        </span>
                        @if (!$loop->last)
                            ,
                        @endif
                    @endforeach
                </h2>
                {{--Genre is a link that lead to book by genre page--}}
                <p>
                    Genres:
                    @foreach($book->genres as $genre)
                        {{-- TODO: create book by genre page & controller & routing--}}
                        <a href="#">{{$genre->genre_name}}</a>
                        @if (!$loop->last)
                            |
                        @endif
                    @endforeach
                </p>
                <hr>
                <p>{{$book->description}}</p>
                <div id="details-bar-container">
                    <div class="detail-container">
                        <img src="{{asset("img/book-series-icon.png")}}" alt="">
                        <p>{{$book->series->series_name}}</p>
                    </div>
                    <div class="detail-container">
                        <img src="{{asset("img/book-language-icon.png")}}" alt="">
                        <p>{{$book->language->language_name}}</p>
                    </div>
                    <div class="detail-container">
                        <img src="{{asset("img/book-publisher-icon.png")}}" alt="">
                        <p>{{$book->publisher->publisher_name}}</p>
                    </div>
                    <div class="detail-container">
                        <img src="{{asset("img/book-pages-icon.png")}}" alt="">
                        <p id="book-format-pages"></p>
                    </div>
                    <div class="detail-container">
                        <img src="{{asset("img/book-publication-date-icon.png")}}" alt="">
                        <p id="book-format-publication-date"></p>
                    </div>
                </div>
            </div>
            <div id="book-formats-container">
                <select id="book-format-select">
                    <option value="-1" disabled selected hidden>Please select a format</option>
                    @foreach($book->formats as $format)
                        <option value="{{ $format->pivot->id}}">
                            {{ $format->format_name }} - {{ $format->pivot->price }}đ
                        </option>
                    @endforeach
                </select>
                <div class="book-format-detail-container">
                    <label for="book-format-price">Price:</label>
                    <p id="book-format-price"></p>
                </div>
                <div class="book-format-detail-container">
                    <label for="book-format-stock">In stock:</label>
                    <p id="book-format-stock"></p>
                </div>
                <div class="book-format-detail-container">
                    <label for="book-format-stock">Select quantity:</label>
                    <input name="" type="number" min="1" max="99">
                </div>
                <form id="add-to-cart-form" action="{{ route('addCart') }}" method="POST">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <input type="hidden" name="format_id" id="format-id">
                    <input type="hidden" name="quantity" id="quantity">
                    <button type="submit">Add to cart</button>
                </form>
            </div>
        </div>
        <hr>
        <div id="authors-container">
            <h1>About the authors</h1>
            @foreach($book->authors as $author)
                <div class="author-details-container">
                    <img src="{{asset('img/author-icon.png')}}" alt="">
                    <a href="#">
                        <h2>{{$author->author_name}}</h2>
                    </a>
                    <p>{{$author->bio}}</p>
                </div>
            @endforeach
        </div>
        <hr>
        <div id="series-container">
            <h1>About the series</h1>
            <div id="series-details-container">
                <img src="{{asset('img/book-series-icon.png')}}" alt="">
                <a href="#">
                    <h1>{{$book->series->series_name}}</h1>
                </a>
                <p>{{$book->series->description}}</p>
            </div>
        </div>
    </div>
@endsection
</body>
</html>

<script>
    let data = @json($book);
    document.addEventListener('DOMContentLoaded', function () {
        // Set event listener for book format select
        document.getElementById('book-format-select').addEventListener('change', function () {
            // Get selected book format id
            let bookFormatId = this.value;
            // Get book format detail
            let bookFormat = data.formats.find(format => format.pivot.id === Number(bookFormatId));
            console.log(data);
            console.log(bookFormat);
            // Update book format detail
            document.getElementById('book-format-price').innerText = bookFormat.pivot.price + 'đ';
            document.getElementById('book-format-stock').innerText = bookFormat.pivot.stock;
            document.getElementById('book-format-pages').innerText = bookFormat.pivot.pages;
            document.getElementById('book-format-publication-date').innerText = bookFormat.pivot.publication_date;
            // Update book cover image
            // document.getElementById('book-format-cover-image').src = bookFormat.pivot.cover_image;
            // Update quantity input max value
            document.querySelector('input[type="number"]').max = bookFormat.pivot.stock;

            const formatSelect = document.getElementById('book-format-select');
            const quantityInput = document.querySelector('input[type="number"]');
            const formatIdInput = document.getElementById('format-id');
            const quantityHiddenInput = document.getElementById('quantity');

            formatSelect.addEventListener('change', function () {
                const bookFormatId = this.value;
                const bookFormat = data.formats.find(format => format.pivot.id === Number(bookFormatId));
                document.getElementById('book-format-price').innerText = bookFormat.pivot.price + 'đ';
                document.getElementById('book-format-stock').innerText = bookFormat.pivot.stock;
                document.getElementById('book-format-pages').innerText = bookFormat.pivot.pages;
                document.getElementById('book-format-publication-date').innerText = bookFormat.pivot.publication_date;
                quantityInput.max = bookFormat.pivot.stock;
                formatIdInput.value = bookFormatId;
            });

            document.querySelector('form#add-to-cart-form').addEventListener('submit', function (event) {
                quantityHiddenInput.value = quantityInput.value;
            });
        });
    });
</script>

