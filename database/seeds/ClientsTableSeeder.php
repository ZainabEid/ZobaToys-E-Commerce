<?php

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $clients = ['Ahmed','Mohammed'];
        
        foreach ($clients as $client) {
            Client::create([
                'name' => $client,
                'phone' => '01149033369',
                'address' => 'Mansoura',

            ]);
        }
        
    }// end of run
}// end of class
