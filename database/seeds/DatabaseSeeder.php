<?php

use Illuminate\Database\Seeder;
use App\Http\Controllers\GoogleSheetSyncController;
use Illuminate\Http\Request;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $request                   = new Request;
        $GoogleSheetSyncController = new GoogleSheetSyncController;
        $GoogleSheetSyncController->sync($request);
        // $this->call(OpendataSeeder::class);
        // $this->call(CategorySeeder::class);
        // $this->call(ProductSeeder::class);

        // $this->call(KnowledgeSeeder::class);
        // $this->call(TopicSeeder::class);
    }
}
