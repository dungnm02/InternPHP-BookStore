<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('/css/master.css') }}">
</head>
<body>
@extends('layouts.master', ['hasSideBar' => true, 'hasSearchBar' => true])
{{--show book list--}}
@section('content')
    <div id="book-grid-container">
        {{--show book in card format--}}
        @foreach($books as $book)
            @include('components.book-card', ['book' => $book])
        @endforeach
    </div>
    {{$books->links('components.pagination')}}
@endsection
</body>
</html>

{{--<script>--}}
{{--    document.addEventListener('DOMContentLoaded', function () {--}}
{{--        let bookTitles = document.getElementsByClassName('book-title');--}}
{{--        console.log(bookTitles);--}}
{{--        for (let i = 0; i < bookTitles.length; i++) {--}}
{{--            bookTitles[i].addEventListener('click', function () {--}}
{{--                let bookId = this.parentElement.getAttribute('data-book-id');--}}
{{--                let url = `/book/${bookId}`;--}}
{{--                fetch(url);--}}
{{--            });--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}
