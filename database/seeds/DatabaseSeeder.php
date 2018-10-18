<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OpendataSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);

        $this->call(KnowledgeSeeder::class);
        $this->call(TopicSeeder::class);
    }
}
