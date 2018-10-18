<?php

use Faker\Factory as Faker;
use App\Models\Product;
use App\Repositories\ProductRepository;

trait MakeProductTrait
{
    /**
     * Create fake instance of Product and save it in database
     *
     * @param array $productFields
     * @return Product
     */
    public function makeProduct($productFields = [])
    {
        /** @var ProductRepository $productRepo */
        $productRepo = App::make(ProductRepository::class);
        $theme = $this->fakeProductData($productFields);
        return $productRepo->create($theme);
    }

    /**
     * Get fake instance of Product
     *
     * @param array $productFields
     * @return Product
     */
    public function fakeProduct($productFields = [])
    {
        return new Product($this->fakeProductData($productFields));
    }

    /**
     * Get fake data of Product
     *
     * @param array $postFields
     * @return array
     */
    public function fakeProductData($productFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'category_id' => $fake->randomDigitNotNull,
            'name' => $fake->text,
            'spec' => $fake->text,
            'description' => $fake->text,
            'company' => $fake->text,
            'warning_sign_text' => $fake->text,
            'url' => $fake->text,
            'images' => $fake->text,
            'inspection_date' => $fake->word,
            'inspection_subject' => $fake->text,
            'inspection_items' => $fake->text,
            'inspection_reports' => $fake->text,
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s')
        ], $productFields);
    }
}
