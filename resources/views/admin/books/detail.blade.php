@extends('admin.layout-admin')
@section('title')
    {{ Str::substr($book->title, 0, 30). "..." }}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>{{ $book->title }}</h2>
            <img src="{{ filter_var($book->thumbnail, FILTER_VALIDATE_URL) ? $book->thumbnail : Storage::url($book->thumbnail)  }}" width="400"  alt="{{ $book->thumbnail  }}" class="img-fluid" alt="Thumbnail">
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title" style="color: red;">Giá: {{ $book->price }}</h2>
                    <p class="card-text">Tác giả: {{ $book->author }}</p>
                    <p class="card-text">Nhà xuất bản: {{ $book->publisher }}</p>
                    <p class="card-text">Ngày xuất bản: {{ $book->publication }}</p>
                    <p class="card-text">Chuyên mục: {{ $book->category->name }}</p>
                    <p class="card-text">Số lượng: {{ $book->quantity }}</p>
                </div>
            </div>
            <div class="mt-2">
                <a class="btn btn-warning" href="{{ route('admin.books.edit', $book->id) }}">Edit</a>
                <a class="btn btn-secondary" href="{{ route('admin.books.index', $book->id) }}">Back</a>
            </div>
        </div>
    </div>
</div>

@endsection
