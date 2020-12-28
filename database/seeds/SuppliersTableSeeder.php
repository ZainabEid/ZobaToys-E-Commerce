<?php

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{
    public function run()
    {
        
        $suppliers = ['felt Supplier', 'wood Supplier', 'accessories supplier'];


        
        $name = ['felt Supplier','wood Supplier' ,'accessories supplier'];
        $phone = [[100],[111] ,[333]];
        $address = ['Cairo','Alex' ,'Mansoura'];
        $description = ['felt Description','wood Description' ,'accessories Description'];
        
        foreach ($suppliers as $index =>$supplier) {
            Supplier::create([
                'name' => $name[$index],
                'phone' => $phone[$index],
                'address' => $address[$index],
                'description' => $description[$index],
                
            ]);
        }


    }// end of run
}//end of Seeder
