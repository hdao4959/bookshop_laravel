@extends('admin.layout-admin')
@section('title')
    Danh mục sản phẩm
@endsection

@section('content')


    <a class="btn btn-primary" href="{{ route("admin.categories.create") }}">Thêm mới</a><br>

    @if (session('message'))
        <span style="color:green">{{ session('message') }}</span>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at }}</td>
                <td>
                    <a  class="btn btn-sm btn-warning" href="{{ route('admin.categories.edit', $item) }}">Edit</a>
                    <a class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xoá không?')" href="{{  route('admin.categories.destroy', $item) }}">Delete</a>
                </td>
            </tr>
            @endforeach
          
        </tbody>
    </table>
@endsection