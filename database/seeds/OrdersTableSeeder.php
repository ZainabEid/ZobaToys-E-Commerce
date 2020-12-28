<?php

use App\Models\Client;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
   
    public function run()
    {
        $orders = [
            '1' =>[
                'client_id' => 1,
                'total_price' => '',
                'paid_trigger' => '',
                'status' => '',
                'products' => [
                   1 => [
                    'product_id' => 1,
                    'quantity' => 100,
                   ],
                   2 => [
                    'product_id' => 1,
                    'quantity' => 200,
                   ]
                ]
            ],
            
        ];
       
        
        foreach ($orders as $index =>$order) {
            $client = Client::findOrFail( $order['client_id']);
            $created_order =  $client->order()->create([]);
            $created_order->products()->attach($order['products']);
            $total_price = 0;

            foreach(  $order['products'] as $product_id => $quantity ){  

                $product = Product::FindOrFail($product_id);
                $total_price += $product->sale_price * $quantity['quantity'];
                
                $product->update([
                    'stock' => $product->stock - $quantity['quantity']
                    ]);
                    
            }//end of products foreach
            
            $created_order -> update(['total_price' => $total_price]);
        }// end of orders foreach
        
    }//end of run
}// end of seeder