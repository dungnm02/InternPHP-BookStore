<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@extends('layouts.master')
@section('content')
    <h1>Book List</h1>
    {{--    Show book in card format--}}
    @foreach($books as $book)
        @include('components.book-card', ['book' => $book])
    @endforeach
@endsection
</body>
</html>
