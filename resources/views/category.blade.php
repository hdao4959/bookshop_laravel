@extends('layout')
@section('title')
    
@endsection

@section('content')
@php
    $i = 0;
  foreach ($books as $key => $value) {
    $i++;
  }
@endphp
<h1>{{ $category->name }}</h1>
<h1>Có {{ $i }} kết quả</h1>
<div class="list-top8" >

  @foreach ($books as $item)
<div class="child" >
  <img src="{{ $item->thumbnail }}" width="280" alt="">
  <a href="{{ route('detail', $item->id) }}"><h3>{{ Str::limit($item->title, 60, '...') }}</h3></a>
  <h3 style="color:red">Giá bán: {{ str_replace(',','.',number_format($item->price)) }}đ</h3>
</div>
@endforeach
</div>
@endsection