<?php

use App\Models\Product;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $products = [
            1 => [
                'ar' => ['name' => 'بودي الدبدوب',
                        'description' => 'دبدوب صغير يتكلم',
                    ],
                'en' => ['name' => 'boody the bear',
                        'description' => 'talking little bear',
                    ],
                'tr' => ['name' => 'Ayi boody',
                        'description' => 'conusabilicek kucuk ayi',
                    ],
                'perchase_price' => 150,
                'sale_price' => 400,
                'stock' => 2000,
                'category_ids' => [
                    4, // boys
                ],
                'productimages' => [
                    'boody1.jpg',
                    'boody2.jpg',
                ],
            ],

           2 => [
                'ar' => ['name' => 'كتاب الانشطة',
                        'description' => '  كتاب يشمل 14 نشاط',
                    ],
                'en' => ['name' => 'quite book',
                        'description' => 'contains 14 activity',
                    ],
                'tr' => ['name' => 'sakin kitapı',
                        'description' => '14 chalisma sayfa dahil',
                    ],
                'perchase_price' => 150,
                'sale_price' => 400,
                'stock' => 2000,
                'category_ids' => [
                    5, // girls
                ], 
                'productimages' => [
                    'activity-book1.jpg',
                    'activity-book2.jpg',
                    'activity-book3.jpg',
                    'activity-book4.jpg',
                ],
            ],
            
           3 => [
            'ar' => ['name' => 'حيوانات الاصابع',
                    'description' => '  عرايس للأصابع',
                ],
            'en' => ['name' => 'finger Pupets',
                    'description' => 'animals pupets',
                ],
            'tr' => ['name' => 'parmak ouyncak',
                    'description' => 'hayvan oyuncak',
                ],
            'perchase_price' => 15,
            'sale_price' => 30,
            'stock' => 90,
            'category_ids' => [
                1, // infant
            ],
            'productimages' => [
                'fingerPuupets1.jpeg',
                'fingerPuupets2.jpeg',
                'fingerPuupets3.jpeg',
                'fingerPuupets4.jpeg',
            ],
        ],

        ];

        foreach ($products as $index =>$product) {
            
            $product_except_images_category_ids = Arr::except($product, ['productimages','category_ids']);
            $new_product = Product::create( $product_except_images_category_ids);

            foreach ($product['productimages'] as $image) {
                $new_product->productimages()->create(['image'=>$image]);
            }// end of productimages foreach
            $new_product->category()->attach($product['category_ids']);
           
        }//end of product foreach
        
        
    }// end of run
}// end of seeder
