<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
   
    public function run()
    {
        $categories = ['Toys','Clothes'];
        
        foreach ($categories as $category) {
            Category::create([
                'ar' => ['name' => $category ],
                'en' => ['name' => $category ],
                'tr' => ['name' => $category ],
                ]);
        }
        
    }// end of run
}
