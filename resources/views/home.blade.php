@extends('layout')

@section('title')
    Trang chủ
@endsection


    @section('content')
    <h1 style="text-align:center">Đây là trang chủ</h1>

    <h3 style="text-align:center">8 sản phẩm có giá cao nhất</h3>
    <div class="list-top8" >
        @foreach ($maxPrice8 as $item)
      <div class="child" >
        <img src="{{ filter_var($item->thumbnail, FILTER_VALIDATE_URL) ? $item->thumbnail : Storage::url($item->thumbnail) }}" width="280" alt="">
        <a href="{{ route('detail', $item->id) }}"><h3>{{ Str::limit($item->title, 60, '...') }}</h3></a>
        <h3 style="color:red">Giá bán: {{ str_replace(',','.',number_format($item->price)) }}đ</h3>
      </div>
    @endforeach
    </div>
 
    <h3 style="text-align:center">8 sản phẩm có giá thấp nhất</h3>
    <div class="list-top8" >
        @foreach ($minPrice8 as $item)
      <div class="child" >
        <img src="{{ $item->thumbnail }}" width="280" alt="">
        <a href="{{ route('detail', $item->id) }}"><h3>{{ Str::limit($item->title, 60, '...') }}</h3></a>
        <h3 style="color:red">Giá bán: {{ str_replace(',','.',number_format($item->price)) }}đ</h3>
      </div>
    @endforeach
    </div>


    @endsection
