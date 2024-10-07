@extends('admin.layout-admin')
@section('title')
    Chỉnh sửa
@endsection

@section('content')
@if (session('success'))
    <span class="text-success">{{ session('success') }}</span>
@endif
    <form action="{{  route('admin.books.update', $book->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PATCH")
        <div>
            <label class="form-label" for="">Title</label>
            <input class="form-control" required type="text" name="title" value="{{ $book->title }}">
        </div>
        <div>
            <label class="form-label" for="">Hình ảnh</label>
            {{-- <input class="form-control" required type="text" name="thumbnail" value="{{ $book->thumbnail }}"> --}}
            <input class="form-control" type="file" name="thumbnail" id="">
            <img class="mt-2 mb-2" src="{{ Storage::url($book->thumbnail) }}" width="200" alt="">
        </div>
        <div>
            <label class="form-label" for="">Tác giả</label>
            <input class="form-control" required type="text" name="author" value="{{ $book->author }}">
        </div>
        <div>
            <label class="form-label" for="">Nhà xuất bản</label>
            <input class="form-control" required type="text" name="publisher" value="{{ $book->publisher }}">
        </div>
        <div>
            <label class="form-label" for="">Ngày xuất bản</label>
            <input class="form-control" required type="date" name="publication" value="{{ Carbon\Carbon::parse($book->publication)->format('Y-m-d')}}">
        </div>
        <div>
            <label class="form-label" for="">Giá bán</label>
            <input class="form-control" required type="number" name="price" value="{{ $book->price }}">
        </div>
        <div>
            <label class="form-label" for="">Số lượng</label>
            <input class="form-control" required type="number" name="quantity" value="{{ $book->quantity }}">
        </div>
        <div>
            <label for="" class="form-label">Danh mục</label>
            <select class="form-control" name="category_id" id="">
                <option value="">--Danh mục--</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if ($category['id'] == $book->category->id)
                    selected
                @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-2">
            <button type="submit" class="btn btn-warning">Sửa</button>
            <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
@endsection
