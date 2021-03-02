<?php

use App\Models\Star;
use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class VendorsTableSeeder extends Seeder
{
    public function run()
    {
        $vendors = [
            1 => [
                'name'=>'ZobaToys',
                'address'=>'mansoura',
                'phone'=>55555555555,
                'about'=>'especial designed educational toys for all kids',
                'admin_id' => 1,
                'avg_star' => 4,


            ],
            2 => [
                'name'=>'Kotub 3ala Raf',
                'address'=>'mansoura',
                'phone'=>4444444444,
                'about'=>'books online',
                'admin_id' => 4,
                'avg_star' => 4,

            ],
        ];

        foreach ($vendors as  $vendor) {
            Vendor::create( $vendor);
        }
        
    }// end of run
}//end of vendors table seeder
