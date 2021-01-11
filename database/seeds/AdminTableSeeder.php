<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class AdminTableSeeder extends Seeder
{
  
    public function run()
    {
        // Super_Admin
        $super_admin = App\Models\Admin::create([
            'name' => 'Super Admin',
            'email' => 'zainabeid2012@gmail.com',
            'photo' => 'super_admin.jpg',
            'phone' => '1155554444',
            'password' => bcrypt('qwertyuiop'),
        ]);

        $super_admin->attachRole('super_admin');
        
        // Admins
        $admins = [
            1 => [
                'name' => 'Mohammed',
                'email' => 'mohammed@gmail.com',
                'photo' => 'mohammed_admin.jpg',
                'phone' => '1055554444',
                'password' => bcrypt('qwertyuiop'),
            ],
            
            2 => [
                'name' => 'Ahmed',
                'email' => 'ahmed@gmail.com',
                'photo' => 'ahmed_admin.jpg',
                'phone' => '1255554444',
                'password' => bcrypt('qwertyuiop'),
            ],
            
            3 => [
                'name' => 'Somaya',
                'email' => 'somaya@gmail.com',
                'photo' => 'Somaya_admin.png',
                'phone' => '1555554444',
                'password' => bcrypt('qwertyuiop'),
                ],    
        ];

        foreach ($admins as $index => $admin) {

            $new_admin = Admin::create($admin);
            $new_admin->attachRole('admin');
        }// end of foreach

    }//end of run
}// end of seeder
