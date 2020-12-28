<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
   protected $fillable = [
       'name', 'description'
   ];

   ############## Start Relations ############## 
   
   public function supplies()
   {
       return $this->hasMany(Supply::class);
    }//end of supplies
    
    ############## End Relations ############## 
    

}// end of model
