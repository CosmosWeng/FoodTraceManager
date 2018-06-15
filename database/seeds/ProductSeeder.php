<?php


use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Opendata;
use App\Utils\Util;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mapping = [
          '穀類、塊根及塊莖原料及其製品' => '米',
          '食用油脂製品'         => '食用油',
          '乳類製品'           => '乳製品',
          '麵條、粉條類製品'       => '麵條',
          '蛋類製品'           => '蛋'
        ];
        
        $categories = Category::all();
        
        $categoryTextMapping = [];
        foreach ($categories as $category) {
            $categoryTextMapping[$category->name] = $category->id;
        }
        
        $datas      = Opendata::where('image_start_at', '!=', '')->inRandomOrder()->get();
        // $datas      = $datas->random(200);
        // dd(count($datas));
        
        $product = [];
        foreach ($datas as $data) {
            // Get category_id
            if (isset($mapping[$data->categories]) && isset($categoryTextMapping[$mapping[$data->categories]])) {
                $category_id = $categoryTextMapping[$mapping[$data->categories]];
            } else {
                continue;
            }
            
            if (empty($data->company) || empty($data->name) || empty($data->inspection_date)) {
                continue;
            }
            
            $images = [];
            if (! empty($data->photo_front)) {
                $images[] = $data->photo_front;
            }
            if (! empty($data->photo_back)) {
                $images[] = $data->photo_back;
            }
            if (! empty($data->photo_side)) {
                $images[] = $data->photo_side;
            }
            
            $inspection_reports = [];
            
            if (! empty($data->inspection_report_1)) {
                $inspection_reports[] = $data->inspection_report_1;
            }
            if (! empty($data->inspection_report_2)) {
                $inspection_reports[] = $data->inspection_report_2;
            }
            if (! empty($data->inspection_report_3)) {
                $inspection_reports[] = $data->inspection_report_3;
            }
            
            if (empty($images) || empty($inspection_reports)) {
                continue;
            }
            
            $product[] = [
              'category_id'        => $category_id,
              'company'            => $data->company,
              'name'               => $data->name,
              'images'             => Util::JsonEncode($images),
              'inspection_reports' => Util::JsonEncode($inspection_reports),
              'inspection_date'    => $data->inspection_date
            ];
        }
        Product::insert($product);
    }
}
