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
                'category_id' => 1, // toys
                'perchase_price' => 150,
                'sale_price' => 400,
                'stock' => 2000,
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
                'category_id' => 1, // toys
                'perchase_price' => 150,
                'sale_price' => 400,
                'stock' => 2000,
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
            'category_id' => 1, // toys
            'perchase_price' => 15,
            'sale_price' => 30,
            'stock' => 90,
            'productimages' => [
                'fingerPuupets1.jpeg',
                'fingerPuupets2.jpeg',
                'fingerPuupets3.jpeg',
                'fingerPuupets4.jpeg',
            ],
        ],

        ];

        foreach ($products as $index =>$product) {
            
            $product_except_images = Arr::except($product, ['productimages']);
            $new_product = Product::create( $product_except_images);

            foreach ($product['productimages'] as $image) {
                $new_product->productimages()->create(['image'=>$image]);
            }// end of productimages foreach
           
        }//end of product foreach
        
        
    }// end of run
}// end of seeder
