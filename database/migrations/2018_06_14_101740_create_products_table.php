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

            $table->text('name')->comment('產品名稱');
            $table->text('spec')->nullable()->comment('包裝規格');
            $table->text('description')->nullable()->comment('產品描述');
            $table->text('company')->nullable()->comment('公司名稱');
            $table->text('warning_sign_text')->nullable()->comment('警語');

            $table->text('url')->nullable()->comment('產品網址');

            $table->json('images')->nullable()->comment('圖片');
            $table->date('inspection_date')->nullable()->comment('送樣或檢驗日期');
            $table->text('inspection_subject')->nullable()->comment('檢驗標的');
            $table->json('inspection_items')->nullable()->comment('檢驗項目');
            $table->json('inspection_reports')->nullable()->comment('檢驗報告');

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
