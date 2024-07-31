<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
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
