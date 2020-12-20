<?php

use App\Models\Product;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $products = ['bear','doll' ,'dress'];
        $product_desc = ['bear description','doll description' ,'dress description'];
        $category_id = [1,1 ,2];
        $perchase_price = [250, 300 ,1000];
        $sales_price = [500, 900 ,2000];
        $stock = [20, 30 ,40];
        
        foreach ($products as $index =>$product) {
            Product::create([
                'ar' => ['name' => $product,
                        'description' => $product_desc[$index],
                ],
                'en' => ['name' => $product,
                        'description' => $product_desc[$index],
                ],
                'tr' => ['name' => $product,
                        'description' => $product_desc[$index],
                ],

                'category_id' => $category_id[$index],
                'perchase_price' => $perchase_price[$index],
                'sale_price' => $sales_price[$index],
                'stock' => $stock[$index],
                
            ]);
        }
        
        
    }// end of run
}
