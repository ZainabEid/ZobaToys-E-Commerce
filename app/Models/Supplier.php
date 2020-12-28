<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    protected $fillable = [
        'name', 'phone' , 'address', 'description'
     ];
     protected $casts = [
        'phone' => 'array',
    ];

    ######### Start Relations #########
    public function supplies(){
        
        return $this->hasMany(Supply::class,'supplier_id');
        
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class,'supplier_id');
    }
    ######### End Relations #########

   
}
