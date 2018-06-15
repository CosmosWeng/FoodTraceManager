<?php

use Illuminate\Database\Seeder;

class OpendataSeeder extends Seeder
{
    private $include = [
      '食用油脂製品',
      '乳類製品',
      '穀類、塊根及塊莖原料及其製品',
      '澱粉類及澱粉水解之糖、轉化糖或糖漿相關製品',
      '烘焙炊蒸製品',
      '麵條、粉條類製品',
      '蛋類製品'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ini_set('memory_limit', '2048M');
        $filePath = storage_path('app').'/188_2.csv';
        
        try {
            $file     = fopen($filePath, 'r');
            $header   = fgetcsv($file);
            $head_len = count($header);

            $data      = [];
            $headerMap = $this->fields();
            while (! feof($file)) {
                $contents = fgetcsv($file);
                if (count($contents) != $head_len) {
                    continue;
                }
              
                $product = [];
                foreach ($contents as $key => &$content) {
                    $index = $header[$key];
                    if ($key == 0) {
                        $index = $this->removeBomUtf8($index);
                    }
                    $product[$headerMap[$index]] = $content;
                }
                if (! in_array($product['categories'], $this->include)) {
                    unset($product);
                    unset($content);
                    unset($contents);
                    continue;
                }
              
                $data[] = $product;
                if (count($data) > 1000) {
                    $this->insertDB($data);
                    $data = [];
                }
                
                unset($product);
                unset($content);
                unset($contents);
            }
            fclose($file);
          
            if (count($data) > 0) {
                $this->insertDB($data);
            }
        } catch (\Exception $e) {
            dd($e);
        }
    }
    
    public function insertDB(&$data)
    {
        DB::table('opendata')->insert($data);
    }
    
    public function removeBomUtf8($s)
    {
        if (substr($s, 0, 3) == chr(hexdec('EF')).chr(hexdec('BB')).chr(hexdec('BF'))) {
            return substr($s, 3);
        } else {
            return $s;
        }
    }

    public function fields()
    {
        return [
          '產品分類'        => 'categories',
          '公司名稱'        => 'company',
          '產品名稱'        => 'name',
          '包裝規格'        => 'specifications',
          '產品追溯系統串接碼'   => 'trace_code',
          '警語'          => 'warning_words',
          '特色'          => 'features',
          '產品圖片有效起始日'   => 'image_start_at',
          '正面外包裝照片'     => 'photo_front',
          '反面外包裝照片'     => 'photo_back',
          '側面外包裝照片'     => 'photo_side',
          '有效起始日'       => 'start_at',
          '每一份量'        => 'amount',
          '本包裝含'        => 'contains',
          '每份熱量'        => 'calorie',
          '每份蛋白質'       => 'protein',
          '每份脂肪'        => 'fat',
          '每份飽和脂肪'      => 'fat_saturated',
          '每份反式脂肪'      => 'fat_trans',
          '每份碳水化合物'     => 'carbohydrates',
          '每份糖'         => 'sugar',
          '每份鈉'         => 'sodium',
          '每100公克熱量'    => 'g100_calorie',
          '每100公克蛋白質'   => 'g100_protein',
          '每100公克脂肪'    => 'g100_fat',
          '每100公克飽和脂肪'  => 'g100_fat_saturated',
          '每100公克反式脂肪'  => 'g100_fat_trans',
          '每100公克碳水化合物' => 'g100_carbohydrates',
          '每100公克糖'     => 'g100_sugar',
          '每100公克鈉'     => 'g100_sodium',
          '每100毫升熱量'    => 'ml100_calorie',
          '每100毫升蛋白質'   => 'ml100_protein',
          '每100毫升脂肪'    => 'ml100_fat',
          '每100毫升飽和脂肪'  => 'ml100_fat_saturated',
          '每100毫升反式脂肪'  => 'ml100_fat_trans',
          '每100毫升碳水化合物' => 'ml100_carbohydrates',
          '每100毫升糖'     => 'ml100_sugar',
          '每100毫升鈉'     => 'ml100_sodium',
          '每日參考值熱量'     => 'dr_calorie',
          '每日參考值蛋白質'    => 'dr_protein',
          '每日參考值脂肪'     => 'dr_fat',
          '每日參考值飽和脂肪'   => 'dr_fat_saturated',
          '每日參考值反式脂肪'   => 'dr_fat_trans',
          '每日參考值碳水化合物'  => 'dr_carbohydrates',
          '每日參考值糖'      => 'dr_sugar',
          '每日參考值鈉'      => 'dr_sodium',
          '營養標示圖片'      => 'nutrition_label_picture',
          '內容物標示'       => 'content_label',
          '內容物標示圖片'     => 'content_label_picture',
          '送樣或檢驗日期'     => 'inspection_date',
          '檢驗項目'        => 'inspection_item',
          '檢驗報告一'       => 'inspection_report_1',
          '檢驗報告二'       => 'inspection_report_2',
          '檢驗報告三'       => 'inspection_report_3',
        ];
    }
    
    // public function header()
    // {
    //     return [
    //       0  => '產品分類',
    //       1  => '公司名稱',
    //       2  => '產品名稱',
    //       3  => '包裝規格',
    //       4  => '產品追溯系統串接碼',
    //       5  => '警語',
    //       6  => '特色',
    //       7  => '產品圖片有效起始日',
    //       8  => '正面外包裝照片',
    //       9  => '反面外包裝照片',
    //       10 => '側面外包裝照片',
    //       11 => '有效起始日',
    //       12 => '每一份量',
    //       13 => '本包裝含',
    //       14 => '每份熱量',
    //       15 => '每份蛋白質',
    //       16 => '每份脂肪',
    //       17 => '每份飽和脂肪',
    //       18 => '每份反式脂肪',
    //       19 => '每份碳水化合物',
    //       20 => '每份糖',
    //       21 => '每份鈉',
    //       22 => '每100公克熱量',
    //       23 => '每100公克蛋白質',
    //       24 => '每100公克脂肪',
    //       25 => '每100公克飽和脂肪',
    //       26 => '每100公克反式脂肪',
    //       27 => '每100公克碳水化合物',
    //       28 => '每100公克糖',
    //       29 => '每100公克鈉',
    //       30 => '每100毫升熱量',
    //       31 => '每100毫升蛋白質',
    //       32 => '每100毫升脂肪',
    //       33 => '每100毫升飽和脂肪',
    //       34 => '每100毫升反式脂肪',
    //       35 => '每100毫升碳水化合物',
    //       36 => '每100毫升糖',
    //       37 => '每100毫升鈉',
    //       38 => '每日參考值熱量',
    //       39 => '每日參考值蛋白質',
    //       40 => '每日參考值脂肪',
    //       41 => '每日參考值飽和脂肪',
    //       42 => '每日參考值反式脂肪',
    //       43 => '每日參考值碳水化合物',
    //       44 => '每日參考值糖',
    //       45 => '每日參考值鈉',
    //       46 => '營養標示圖片',
    //       47 => '內容物標示',
    //       48 => '內容物標示圖片',
    //       49 => '送樣或檢驗日期',
    //       50 => '檢驗項目',
    //       51 => '檢驗報告一',
    //       52 => '檢驗報告二',
    //       53 => '檢驗報告三',
    //     ];
    // }
}
