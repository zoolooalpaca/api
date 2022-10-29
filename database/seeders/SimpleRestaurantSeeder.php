<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Food;
use App\Models\Manager;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SimpleRestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::factory(50)->create();

        $restaurant = new Restaurant();
        $restaurant->name = 'Restaurant Test';
        $restaurant->owner_id = Manager::inRandomOrder()->first()->id;
        $restaurant->save();
        
        Category::factory(10)->create();
        Food::factory(10)->create();

        $food_list = Food::get();

        foreach ($food_list as $food) {
            $rand_max_cat = rand(2, 4);
            $category_ids = Category::inRandomOrder()
                                ->limit($rand_max_cat)
                                ->get();
            $food->categories()->saveMany(
                $category_ids
            );
        }
    }
}
