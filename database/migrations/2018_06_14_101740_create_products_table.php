<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->comment('產品分類ID');
            $table->text('company')->nullable()->comment('公司名稱');
            $table->text('name')->comment('產品名稱');

            $table->text('description')->nullable()->comment('產品描述');
            $table->text('url')->nullable()->comment('產品網址');
            $table->json('images')->nullable()->comment('圖片');
            $table->text('inspection_text')->nullable()->comment('檢驗描述');
            $table->json('inspection_reports')->nullable()->comment('檢驗報告');
            // $table->date('inspection_date')->nullable()->comment('送樣或檢驗日期');

            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('更新時間');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('建立時間');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
