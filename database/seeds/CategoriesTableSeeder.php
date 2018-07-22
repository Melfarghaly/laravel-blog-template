<?php

use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;

use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	Category::insert([
    		'name' => 'uncategorized',
    		'description' => 'Does no belong to any Category'
    	]);

    }
}
