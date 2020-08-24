<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = App\Models\Admin::create([
            'name' => 'AdminName',
            'email' => 'zainabeid2012@gmail.com',
            'photo' => '',
            'phone' => '1155554444',
            'password' => bcrypt('qwertyuiop'),
        ]);

        $admin->attachRole('super_admin');
        
         
    }
}
