<?php

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class ClientsTableSeeder extends Seeder
{

    public function run()
    {

        $clients = [
            1 => [
                'first_name' => 'Mohammed',
                'last_name' => 'Mohammed',
                'phone' => 1188855511,
                'address' => 'mansoura',
                'user' => [
                    'email' => 'mohammed@gmail.com',
                    'password' => bcrypt('qwertyuiop'),
                ]
            ],

            2 => [
                'first_name' => 'Ahmed',
                'last_name' => 'Ahmed',
                'phone' => 1249033369,
                'address' => 'mansoura',
                'user' => [
                    'email' => 'ahmed@gmail.com',
                    'password' => bcrypt('qwertyuiop'),
                ]

            ],
            3 => [
                'first_name' => 'Eid',
                'last_name' => 'Eid',
                'phone' => 1555554443,
                'address' => 'mansoura',
                'user' => [
                    'email' => 'eid@gmail.com',
                    'password' => bcrypt('qwertyuiop'),
                ],

            ],
            4 => [
                'first_name' => 'Sandy',
                'last_name' => 'Sandy',
                'phone' => 1555554444,
                'address' => 'mansoura',
                'user' => [
                    'email' => 'sandy@gmail.com',
                    'password' => bcrypt('qwertyuiop'),
                ],

            ],
        ];

        foreach ($clients as $client) {
           
           $client_except_user =  Arr::except($client,'user');
            $new_client = Client::create($client_except_user);
            $new_client->user()->create($client['user']);

            // $new_client->attachRole('client');
        } // end foreach


    } // end of run

}// end of class
