<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    const ROOT_VIEW  = 'admin.books.';
    const FILE_UPLOAD_PATH = 'img_thumbnails';
    public function index()
    {
        $maxPrice8 =  DB::table('books')->orderByDesc('price')->limit(8)->get();
        $minPrice8 =  DB::table('books')->orderBy('price')->limit(8)->get();
        // return response()->json($maxPrice8);

        return view('home', compact('maxPrice8', 'minPrice8'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view(self::ROOT_VIEW . __FUNCTION__, compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        // $request->validate(
        //     [
        //         'title' => ['required', 'min:10'],
        //         'thumbnail' => ['required', 'image'],
        //         'author' => ['required'],
        //         'publisher' => ['required'],
        //         'publication' => ['required'],
        //         'price' => ['required', 'integer'],
        //         'quantity' => ['required', 'integer'],
        //         'category_id' => ['required', 'integer']
        //     ],
        //     [
        //         'title.required' => "Bạn chưa nhập title",
        //         'title.min' => "Bạn phải nhập title ít nhất 10 kí tự",
        //         'thumbnail.required' => "Bạn chưa chọn hình ảnh", 
        //         'thumbnail.image' => "Hình ảnh bạn chọn không hợp lệ", 
        //         'author.required' => "Bạn chưa nhập tên tác giả", 
        //         'publisher.required' => "Bạn chưa nhập nhà xuất bản", 
        //         'publication.required' => "Bạn chưa nhập ngày xuất bản", 
        //         'price.required' => "Bạn chưa nhập giá sản phẩm",  
        //         'price.integer' => "Giá sản phẩm phải là số", 
        //         'quantity.required' => "Bạn chưa nhập số lượng sản phẩm", 
        //         'quanttiy.integer' => "Số lượng sản phẩm phải là số",  
        //         'category_id.required' => "Bạn chưa chọn danh mục sản phẩm", 
        //         'category_id.integer' => "Danh mục sản phẩm không hợp lệ"
        //     ]
        // );

        
        Book::create([
            'title' => $request->title,
            'thumbnail' => Storage::put(self::FILE_UPLOAD_PATH , $request->thumbnail),
            'author' => $request->author,
            'publisher' => $request->publisher,
            'publication' => $request->publication,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
        ]);

        
        return redirect()->route('admin.books.index')->with('success', 'Thêm sách thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
        $book = Book::query()->where('id', $id)->with('category')->firstOrFail();
        // return response()->json($book);
        return view(__FUNCTION__, compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::find($id);
        $categories = Category::all();
       
        return view(self::ROOT_VIEW . __FUNCTION__, compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        $book = Book::query()->find($id);

        $data = [
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'publication' => $request->publication,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
        ];
        if($request->thumbnail){
           $thumbnail = Storage::put(self::FILE_UPLOAD_PATH, $request->thumbnail);
           $data['thumbnail'] = $thumbnail;
           if(Storage::exists($book->thumbnail)){
               Storage::delete($book->thumbnail);
           }
        }
        $book->update($data);

        return redirect()->route('admin.books.edit', $id)->with('success', "Cập nhật thông tin sách thành công");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Xoá sách thành công');
    }

    public function adminBooksList()
    {
        $books = Book::latest('id')->paginate(5);
        // return response()->json($books);
        return view(self::ROOT_VIEW . 'list', compact('books'));
    }
    public function adminBookDetail(String $id)
    {
        $book = Book::with('category')->findOrFail($id);
        // return response()->json($book);

        return view(self::ROOT_VIEW . "detail", compact('book'));
    }
}
