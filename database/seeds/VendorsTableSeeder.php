<?php

use App\Models\Admin;
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
                'name' => 'ZobaToys',
                'address' => 'mansoura',
                'phone' => 55555555555,
                'about' => 'especial designed educational toys for all kids',
                'avg_star' => 4,
                'admin' => [
                    'name' => 'zoba toys vendor',
                    'email' => 'zobatoysvendor@gmail.com',
                    'photo' => 'zobatoysvendor_admin.jpg',
                    'phone' => '1254454444',
                    'password' => bcrypt('qwertyuiop'),
                ],


            ],
            2 => [
                'name' => 'Kotub 3ala Raf',
                'address' => 'mansoura',
                'phone' => 4444444444,
                'about' => 'books online',
                'avg_star' => 4,
                'admin' => [
                    'name' => 'hend',
                    'email' => 'hend@gmail.com',
                    'photo' => 'hend_admin.jpg',
                    'phone' => '1253354444',
                    'password' => bcrypt('qwertyuiop'),
                ],

            ],
        ];

        foreach ($vendors as  $vendor) {
            $vendor_except_admin = Arr::except($vendor,'admin');
            $new_vendor = Admin::create($vendor['admin'])->vendor()->create($vendor_except_admin);
            $new_vendor->admin->attachRole('master_vendor', 'vendor');
            // $new_vendor->admin->attachRole('vendor');
        }
    } // end of run
}//end of vendors table seeder
