<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'client_id', 'total_price'
    ];


    ############## relationships ###################
    
    // one to many --> a client has many orders
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // many to many --> orders has many products , products belongs to may orders
    public function product()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

}// end of model
