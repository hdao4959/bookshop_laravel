@extends('admin.layout-admin')
@section('title')
    Thêm mới danh mục
@endsection

@section('content')

        <form action="" method="post">
            @csrf
          <div>
            <label for="name">Tên danh mục</label>
            <input type="text" name="name" id="name"><br>
            <span id="message"></span>
          </div>
            <button type="submit">Thêm mới</button>
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

