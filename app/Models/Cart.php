<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillables = [
        'user_id' , 'total_price'
    ];

      ############## Start Relations ###################
    
    // one to many --> a client has many orders
    public function user()
    {
        return $this->belongsTo(User::class);
    }// end of user()
    
    // many to many --> orders has many products , products belongs to may orders
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }// edn of product()
    ############## End Relations ###################
}// end of model
