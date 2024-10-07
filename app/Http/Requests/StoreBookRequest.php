<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'min:10'],
            'thumbnail' => ['required', 'image'],
            'author' => ['required'],
            'publisher' => ['required'],
            'publication' => ['required'],
            'price' => ['required', 'integer'],
            'quantity' => ['required', 'integer'],
            'category_id' => ['required', 'integer']
        ];
    }

    public function messages(){
        return [
            'title.required' => "Bạn chưa nhập title",
            'title.min' => "Bạn phải nhập title ít nhất 10 kí tự",
            'thumbnail.required' => "Bạn chưa chọn hình ảnh", 
            'thumbnail.image' => "Hình ảnh bạn chọn không hợp lệ", 
            'author.required' => "Bạn chưa nhập tên tác giả", 
            'publisher.required' => "Bạn chưa nhập nhà xuất bản", 
            'publication.required' => "Bạn chưa nhập ngày xuất bản", 
            'price.required' => "Bạn chưa nhập giá sản phẩm",  
            'price.integer' => "Giá sản phẩm phải là số", 
            'quantity.required' => "Bạn chưa nhập số lượng sản phẩm", 
            'quanttiy.integer' => "Số lượng sản phẩm phải là số",  
            'category_id.required' => "Bạn chưa chọn danh mục sản phẩm", 
            'category_id.integer' => "Danh mục sản phẩm không hợp lệ"
        ];
    }
}
