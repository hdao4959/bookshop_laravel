@extends('admin.layout-admin')
@section('title')
    Chỉnh sửa danh mục
@endsection

@section('content')

        <form action="{{  route('admin.categories.update', $category) }}" method="post">
            @csrf
            @method("PATCH")
          <div>
            <label class="form-label" for="name">Tên danh mục</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ $category->name }}"><br>
            <span id="message"></span>
          </div>
            <button class="btn btn-warning btn-sm" type="submit">Sửa</button>
        </form>

        <script>
            let input = document.getElementById("name");
            let span = document.getElementById("message");
            let form = document.getElementsByTagName('form')[0]
            form.onsubmit = function(e){
                e.preventDefault();
                if(input.value.trim()){
                    form.submit();
                }else{
                    span.innerText = "Trường này không được để trống!";
                    span.style.color = "red";
                }
            }
            
        </script>
@endsection

