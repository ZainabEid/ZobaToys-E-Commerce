<?php

use App\Models\Supply;
use Illuminate\Database\Seeder;

class SuppliesTableSeeder extends Seeder
{
    
    public function run()
    {
       
        
        $supplies = ['feltRed', 'FeltBlue', 'WoodBoard','BookRings'];
        
        
        $supplier_id = [1,1,2,3];
        $group_id = [2,2,3,4];
        $name = ['felt ','felt', 'wood' ,'accessories'];
        $color = ['red','blue', 'brown' ,'silver'];
        $purchase_price = [180,180,350,50];
        $image = ['default.png','default.png','default.png','default.png'];
        $description =  ['feltRed', 'FeltBlue', 'WoodBoard','BookRings'];
        $stock = [0,3,3,100];
        $stock_unit = ['roll','roll' ,'meter', 'piece'];
        
        foreach ($supplies as $index =>$supply) {
            Supply::create([
                'supplier_id' => $supplier_id[$index],
                'group_id' => $group_id[$index],
                'name' => $name[$index],
                'color' => $color[$index],
                'purchase_price' => $purchase_price[$index],
                'image' => $image[$index],
                'description' => $description[$index],
                'stock' => $stock[$index],
                'stock_unit' => $stock_unit[$index],
                
            ]);
        }

    }//end of run function
}//end of seeder
