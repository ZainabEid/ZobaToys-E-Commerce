<?php

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
   
    public function run()
    {
        $groups = ['general group','Felt','Wood','Accessories', 'silicon', 'tools', 'machines', 'packs', 'organizers', 'office' ];
        
        foreach ($groups as $group) {
            Group::create([
               'name'=> $group,
               'description' => $group.' Description',
                ]);
        }
    }//end of run function 
}// end of Group seeder
