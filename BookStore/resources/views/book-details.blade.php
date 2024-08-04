<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Details</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/master.css') }}">
</head>
<body>
@extends('layouts.master', ['hasSideBar' => false])
@section('content')
    <div id="main-container">
        <div id="book-container">
            <img id="book-format-cover-image" src="{{asset('book_cover_image.jpg')}}" alt="">
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
                        <span>
                            <a href="#">
                                {{$genre->genre_name}}
                            </a>
                        </span>
                        @if (!$loop->last)
                            ,
                        @endif
                    @endforeach
                </p>
                <p>{{$book->description}}</p>
                <div class="details-bar-container">
                    <div class="detail-container">
                        <img src="" alt="">
                        <p>{{$book->series->series_name}}</p>
                    </div>
                    <div class="detail-container">
                        <img src="" alt="">
                        <p>{{$book->language->language_name}}</p>
                    </div>
                    <div class="detail-container">
                        <img src="" alt="">
                        <p>{{$book->publisher->publisher_name}}</p>
                    </div>
                    <div class="detail-container">
                        <img src="" alt="">
                        <p id="book-format-pages"></p>
                    </div>
                    <div class="detail-container">
                        <img src="" alt="">
                        <p id="book-format-publication-date"></p>
                    </div>
                </div>
            </div>
            <div id="book-formats-container">
                <select id="book-format-select">
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
                    <label for="book-format-stock">Select quantity</label>
                    <input name="" type="number" min="1" max="99">
                </div>
                <button>Add to cart</button>
            </div>
        </div>
        <div>
            <p>About the authors</p>
        </div>
        <div>
            <p>Series</p>
            <div>
                <p>Books in series</p>
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
        });
    });
</script>

