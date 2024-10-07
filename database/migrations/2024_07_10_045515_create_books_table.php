<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Category::class)->constrained();
            $table->string('title')->comment("Tiêu đề sách");
            $table->string('thumbnail')->comment("Ảnh mô tả");
            $table->string('author')->comment("Tác giả");
            $table->string('publisher')->comment("Nhà xuất bản");
            $table->dateTime('publication')->comment("Ngày xuất bản");
            $table->double('price')->comment("Giá bán");
            $table->integer('quantity')->comment("Số lượng");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
