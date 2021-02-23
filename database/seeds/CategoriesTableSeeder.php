<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
   
    public function run()
    {
        $wraps = ['age','gender','subject','material'];
        $categories = [
            1 => [
                'ar' => ['name' => 'رضع'],
                'en' => ['name' => 'infant'],
                'tr' => ['name' => 'bebek'],
                'wrap_id'=>1, // age
                
            ],
            2 => [
                'ar' => ['name' => 'اطفال'],
                'en' => ['name' => 'toddler'],
                'tr' => ['name' => 'çocuk'],
                'wrap_id'=>1,
            ],
            3 => [
                'ar' => ['name' => 'حضانة'],
                'en' => ['name' => 'KG'],
                'tr' => ['name' => 'ana okulu'],
                'wrap_id'=>1,
            ],
            4 => [
                'ar' => ['name' => 'الولاد'],
                'en' => ['name' => 'KG'],
                'tr' => ['name' => 'oğulan'],
                'wrap_id'=>2, //gender
            ],
            5 => [
                'ar' => ['name' => 'البنات'],
                'en' => ['name' => 'girl'],
                'tr' => ['name' => 'kızlar'],
                'wrap_id'=>2, //gender
            ],
            6 => [
                'ar' => ['name' => 'للجنسين'],
                'en' => ['name' => 'no-gender'],
                'tr' => ['name' => 'kızlar ver oğlanlar'],
                'wrap_id'=>2, //gender
            ],
            7 => [
                'ar' => ['name' => 'عربي'],
                'en' => ['name' => 'arabic'],
                'tr' => ['name' => 'Arapca'],
                'wrap_id'=>3, //subject
            ],
            8 => [
                'ar' => ['name' => 'رياضيات'],
                'en' => ['name' => 'arabic'],
                'tr' => ['name' => 'matimaik'],
                'wrap_id'=>3, //subject
            ],
            9 => [
                'ar' => ['name' => 'انجليزي'],
                'en' => ['name' => 'english'],
                'tr' => ['name' => 'inglizce'],
                'wrap_id'=>3, //subject
            ],
            10 => [
                'ar' => ['name' => 'علوم'],
                'en' => ['name' => 'science'],
                'tr' => ['name' => 'bilmeli'],
                'wrap_id'=>3,//subject
            ],
            11 => [
                'ar' => ['name' => 'جوخ'],
                'en' => ['name' => 'felt'],
                'tr' => ['name' => 'kumaş'],
                'wrap_id'=>4, //material
            ],
            12 => [
                'ar' => ['name' => 'خشب'],
                'en' => ['name' => 'wood'],
                'tr' => ['name' => 'ahşap'],
                'wrap_id'=>4, //material
            ],
            13 => [
                'ar' => ['name' => 'ورق'],
                'en' => ['name' => 'paper'],
                'tr' => ['name' => 'evrak'],
                'wrap_id'=>4, //material
            ],

        ];
        
        foreach ($categories as $category) {
            Category::create($category);
        }
        
    }// end of run
}
