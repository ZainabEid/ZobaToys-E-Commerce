<?php

use App\Models\Supplier;
use App\Models\Supply;
use Illuminate\Database\Seeder;

class PurchasesTableSeeder extends Seeder
{
   
    public function run()
    {
        $purchases = [
            1 =>[
                'supplier_id' => 1, // felt suppler
                'total_price' => '',
                'supplies' => [
                   1 => [
                    'supply_id' => 1, // felt red
                    'quantity' => 100,
                   ],
                   2 => [
                    'supply_id' => 2, // felt blue
                    'quantity' => 200,
                   ]
                ]
            ],

            2 =>[
                'supplier_id' => 2, //wood suuplier
                'total_price' => '',
                'supplies' => [
                   1 => [
                    'supply_id' => 3, // wood brown
                    'quantity' => 100,
                   ],
                ]
            ],

            3 =>[
                'supplier_id' => 3, // accessories supplier
                'total_price' => '',
                'supplies' => [
                   1 => [
                    'supply_id' => 4, // accessories silver 
                    'quantity' => 300,
                   ],
                ]
            ],
            
        ];
       
        
        foreach ($purchases as $index =>$purhase) {
            $supplier = Supplier::findOrFail( $purhase['supplier_id']);
            $created_purhase =  $supplier->purchases()->create([]);
            $created_purhase->supplies()->attach($purhase['supplies']);
            $total_price = 0;

            foreach(  $purhase['supplies'] as $supply_id => $quantity ){  

                $supply = Supply::FindOrFail($supply_id);
                $total_price += $supply->purchase_price * $quantity['quantity'];
                
                $supply->update([
                    'stock' => $supply->stock - $quantity['quantity']
                    ]);
                    
            }//end of supplies foreach
            
        }// end of purchases foreach
        
    }//end of run
}// end of seeder
