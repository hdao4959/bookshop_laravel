@extends('admin.layout-admin')

@section('title')
    Sản phẩm
@endsection

@section('content')
<div class="">
<a class="btn btn-primary" href="{{ route('admin.books.create') }}">Thêm mới</a>

</div>
@if (session('success'))
    <span class="text-success">{{ session('success') }}</span>
@endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Thumbnail</th>
                <th>Author</th>
                <th>Publisher</th>
                <th>Publication</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Category_id</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($books as $item)
            <tr>
                <th>{{ $item->id }}</th>
                <th>{{ $item->title }}</th>
                <th>
                    <img src="{{ filter_var($item->thumbnail, FILTER_VALIDATE_URL) ? $item->thumbnail : Storage::url($item->thumbnail)  }}" width="100"  alt="{{ $item->thumbnail }}">
                </th>
                <th>{{ $item->author }}</th>
                <th>{{ $item->publisher }}</th>
                <th>{{ $item->publication }}</th>
                <th>{{ $item->price }}</th>
                <th>{{ $item->quantity }}</th>
                <th>{{ $item->category->name }}</th>
                <th nowrap>
                    <a class="btn btn-sm btn-secondary" href="{{ route("admin.books.detail", $item->id) }}">Detail</a>
                    <a class="btn btn-sm btn-warning" href="{{ route('admin.books.edit', $item->id) }}">Edit</a>
                    <a href="{{ route("admin.books.destroy", $item->id) }}" onclick="return confirm('Bạn có chắc chắn muốn xoá không?')" class="btn btn-sm btn-danger" href="">Delete</a>
                </th>
              
            </tr>
            @endforeach
          
        </tbody>
    </table>
   {{ $books->links('pagination::bootstrap-4') }}
@endsection