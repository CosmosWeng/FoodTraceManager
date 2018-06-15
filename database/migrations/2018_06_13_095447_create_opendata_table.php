<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpendataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('opendata', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('categories', 64)->comment('產品分類');
        //     $table->text('company')->comment('公司名稱');
        //     $table->text('name')->comment('產品名稱');
        //     $table->text('specifications')->comment('包裝規格');
        //     $table->text('trace_code')->comment('產品追溯系統串接碼');
        //     $table->text('warning_words')->comment('警語');
        //     $table->text('features')->comment('特色');
        //     $table->text('image_start_at')->comment('產品圖片有效起始日');
        //     $table->text('photo_front')->comment('正面外包裝照片');
        //     $table->text('photo_back')->comment('反面外包裝照片');
        //     $table->text('photo_side')->comment('側面外包裝照片');
        //     $table->text('start_at')->comment('有效起始日');
        //     $table->text('amount')->comment('每一份量');
        //     $table->text('contains')->comment('本包裝含');
        //     $table->text('calorie')->comment('每份熱量');
        //     $table->text('protein')->comment('每份蛋白質');
        //     $table->text('fat')->comment('每份脂肪');
        //     $table->text('fat_saturated')->comment('每份飽和脂肪');
        //     $table->text('fat_trans')->comment('每份反式脂肪');
        //     $table->text('carbohydrates')->comment('每份碳水化合物');
        //     $table->text('sugar')->comment('每份糖');
        //     $table->text('sodium')->comment('每份鈉');
        //     $table->text('g100_calorie')->comment('每100公克熱量');
        //     $table->text('g100_protein')->comment('每100公克蛋白質');
        //     $table->text('g100_fat')->comment('每100公克脂肪');
        //     $table->text('g100_fat_saturated')->comment('每100公克飽和脂肪');
        //     $table->text('g100_fat_trans')->comment('每100公克反式脂肪');
        //     $table->text('g100_carbohydrates')->comment('每100公克碳水化合物');
        //     $table->text('g100_sugar')->comment('每100公克糖');
        //     $table->text('g100_sodium')->comment('每100公克鈉');
        //     $table->text('ml100_calorie')->comment('每100毫升熱量');
        //     $table->text('ml100_protein')->comment('每100毫升蛋白質');
        //     $table->text('ml100_fat')->comment('每100毫升脂肪');
        //     $table->text('ml100_fat_saturated')->comment('每100毫升飽和脂肪');
        //     $table->text('ml100_fat_trans')->comment('每100毫升反式脂肪');
        //     $table->text('ml100_carbohydrates')->comment('每100毫升碳水化合物');
        //     $table->text('ml100_sugar')->comment('每100毫升糖');
        //     $table->text('ml100_sodium')->comment('每100毫升鈉');
        //     $table->text('dr_calorie')->comment('每日參考值熱量');
        //     $table->text('dr_protein')->comment('每日參考值蛋白質');
        //     $table->text('dr_fat')->comment('每日參考值脂肪');
        //     $table->text('dr_fat_saturated')->comment('每日參考值飽和脂肪');
        //     $table->text('dr_fat_trans')->comment('每日參考值反式脂肪');
        //     $table->text('dr_carbohydrates')->comment('每日參考值碳水化合物');
        //     $table->text('dr_sugar')->comment('每日參考值糖');
        //     $table->text('dr_sodium')->comment('每日參考值鈉');
        //     $table->text('nutrition_label_picture')->comment('營養標示圖片');
        //     $table->text('content_label')->comment('內容物標示');
        //     $table->text('content_label_picture')->comment('內容物標示圖片');
        //     $table->text('inspection_date')->comment('送樣或檢驗日期');
        //     $table->text('inspection_item')->comment('檢驗項目');
        //     $table->text('inspection_report_1')->comment('檢驗報告一');
        //     $table->text('inspection_report_2')->comment('檢驗報告二');
        //     $table->text('inspection_report_3')->comment('檢驗報告三');
        //
        //     //
        //     $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('更新時間');
        //     $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('建立時間');
        // });
    }
    //產品分類,公司名稱,產品名稱,包裝規格,產品追溯系統串接碼,警語,特色,產品圖片有效起始日,正面外包裝照片,反面外包裝照片,側面外包裝照片,有效起始日,每一份量,本包裝含,每份熱量,每份蛋白質,每份脂肪,每份飽和脂肪,每份反式脂肪,每份碳水化合物,每份糖,每份鈉,每100公克熱量,每100公克蛋白質,每100公克脂肪,每100公克飽和脂肪,每100公克反式脂肪,每100公克碳水化合物,每100公克糖,每100公克鈉,每100毫升熱量,每100毫升蛋白質,每100毫升脂肪,每100毫升飽和脂肪,每100毫升反式脂肪,每100毫升碳水化合物,每100毫升糖,每100毫升鈉,每日參考值熱量,每日參考值蛋白質,每日參考值脂肪,每日參考值飽和脂肪,每日參考值反式脂肪,每日參考值碳水化合物,每日參考值糖,每日參考值鈉,營養標示圖片,內容物標示,內容物標示圖片,送樣或檢驗日期,檢驗項目,檢驗報告一,檢驗報告二,檢驗報告三

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('opendata');
    }
}
