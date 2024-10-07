@extends('admin.layout-admin')
@section('title')
    Thêm mới
@endsection

@section('content')


    <form action="{{ route('admin.books.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div>
            <label class="form-label" for="">Title</label>
            <input class="form-control" type="text" name="title" value="{{ old('title') }}">
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label class="form-label" for="">Hình ảnh</label>
            <input class="form-control" type="file" name="thumbnail" id="">
            @error('thumbnail')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label class="form-label" for="">Tác giả</label>
            <input class="form-control" type="text" name="author" value="{{ old('author') }}">
            @error('author')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label class="form-label" for="">Nhà xuất bản</label>
            <input class="form-control" type="text" name="publisher" value="{{ old('publisher') }}">
            @error('publisher')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label class="form-label" for="">Ngày xuất bản</label>
            <input class="form-control" type="date" name="publication" value="{{ old('publication') }}">
            @error('publication')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label class="form-label" for="">Giá bán</label>
            <input class="form-control" type="number" name="price" value="{{ old('price') }}">
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label class="form-label" for="">Số lượng</label>
            <input class="form-control" type="number" name="quantity" value="{{ old('quantity') }}">
            @error('quantity')
<span class="text-danger">{{ $message }}</span>
    
@enderror
        </div>
        <div>
            <label for="" class="form-label">Danh mục</label>
            <select class="form-control" name="category_id" id="">
                <option value="">--Danh mục--</option>
                @foreach ($categories as $category)
                    <option @selected($category->id == old('category_id')) value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
<span class="text-danger">{{ $message }}</span>
    
@enderror
        </div>

        <div class="mt-2">
            <button type="submit" class="btn btn-success">Thêm </button>
            <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
@endsection
