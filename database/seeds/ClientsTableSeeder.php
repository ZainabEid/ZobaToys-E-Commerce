<?php

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
   
    public function run()
    {
        
        $clients = [
            1=>[
                'name' => 'Mohammed',
                'phone' => 1188855511,
                'address' => 'mansoura',
                'email' => 'mohammed@gmail.com',
                'username' => 'mohammed',
                'password' => bcrypt('qwertyuiop'),
            ],
            2=>[
                'name' => 'Ahmed',
                'phone' => 1249033369,
                'address' => 'mansoura',
                'email' => 'ahmed@gmail.com',
                'username' => 'ahmed',
                'password' => bcrypt('qwertyuiop'),
            ],
            3=>[
                'name' => 'Eid',
                'phone' => 1555554443,
                'address' => 'mansoura',
                'email' => 'eid@gmail.com',
                'username' => 'samir',
                'password' => bcrypt('qwertyuiop'),
            ],
            4=>[
                'name' => 'Sandy',
                'phone' => 1555554444,
                'address' => 'mansoura',
                'email' => 'sandy@gmail.com',
                'username' => 'sandy',
                'password' => bcrypt('qwertyuiop'),
            ],
        ];
        
        foreach ($clients as $client) {
            $new_client = Client::create($client);
           // $new_client->attachRole('client');
        }// end foreach
    
        
    }// end of run
    
}// end of class
