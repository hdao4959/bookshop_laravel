<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    const PATH_VIEW = 'admin.category.';
    public function index()
    {
        $categories = Category::all();
        return view(self::PATH_VIEW . 'list', compact('categories'));
    }


    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }


    public function store(Request $request)
    {
        DB::table('categories')->insert([
            'name' => $request->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('admin.categories.index')->with('message', 'Bạn đã thêm danh mục thành công');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $category = Category::find($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('category'));
    }


    public function update(Request $request, string $id)
    {   
        $categoryId = Category::find($id);
        if($categoryId){
            $categoryId->update([
                'name' => $request->name,
                'updated_at' => now()
                
            ]);
            return redirect()->route('admin.categories.index')->with('message', "Cập nhật danh mục thành công");
        }

        return redirect()->route('admin.categories.index')->with('message', "Sản phẩm không tồn tại");


    }


    public function destroy(string $id)
    {
        $category = Category::find($id);
        if($category){
            $category->delete();
            return redirect()->route('admin.categories.index')->with('message', "Bạn đã xoá danh mục thành công");
        }
        return redirect()->route('admin.categories.index')->with('message', "Sản phẩm không tồn tại");
    }

    
    public function showBooks(string $id){
        $category = Category::findOrFail($id);
        $books = Book::all()->where('category_id', '=', $id);
        return view('category', compact('category','books'));
    }
}
