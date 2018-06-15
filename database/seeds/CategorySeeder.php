<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['米','麵粉','麵條','食用油','乳製品','蛋'];
        $data       = [];
        foreach ($categories as $category) {
            $data[] = [
              'name' => $category
            ];
        }
        Category::insert($data);
    }
}
