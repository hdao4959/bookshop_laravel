@extends('layout')

@section('title')
    Chi tiết
@endsection
    @section('content')
    <h2> {{ $book->title }}</h2>

    <div style="display:flex">
        <div class="left">
    <img src="{{ filter_var($book->thumbnail, FILTER_VALIDATE_URL) ? $book->thumbnail : Storage::url($book->thumbnail) }}" alt="">

        </div>
        <div class="right" style="margin-left:20px">
            <h2 style="color:red">Giá: {{ $book->price }}</h2>
            <h2>Tác giả: {{ $book->author }}</h2>
            <h2>Nhà xuất bản: {{ $book->publisher }}</h2>
            <h2>Số lương: {{ $book->quantity }}</h2>
            <h2>Loại sách: {{ $book->category['name'] }}</h2i:>
        </div>
    </div>
    @endsection
