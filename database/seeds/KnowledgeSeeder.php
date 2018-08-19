<?php

use Illuminate\Database\Seeder;
use App\Models\Knowledge;

class KnowledgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create('zh_TW');
        $faker->addProvider(new EmanueleMinotto\Faker\PlaceholdItProvider($faker));
        $this->faker = $faker;
        
        for ($i = 0; $i < 50; $i++) {
            $data  = [
              'title'  => $faker->realText($faker->numberBetween(10, 20)),
              'images' => $this->randImage(rand(2, 5)),
              'date'   => $faker->dateTimeBetween('now', '10 years')->format('Y-m-d H:i:s')
            ];
            Knowledge::create($data);
        }
    }
    
    public function randImage($n)
    {
        $background = ['000', 'FF0000', '0000CD', 'FFFF00', '32CD32'];
        $foreground = ['fff', 'FF0000', '0000CD', 'FFFF00', '32CD32'];
        $images     = [];
        for ($i = 0; $i < $n; $i++) {
            $images[] = $this->faker->imageUrl(['800', '600'], 'png', [$background[rand(0, 4)], $foreground[rand(0, 4)]]);
        }

        return $images;
    }
}
