<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'client_id', 'total_price', 'paid_trigger', 'status','ship_trigger'
    ];



    ############## Start Relations ###################
    
    // one to many --> a client has many orders
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    
    // many to many --> orders has many products , products belongs to may orders
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
    ############## End Relations ###################

  public function paid_trigger()
  {
      return ($this->paid_trigger ? 'cash' : 'credit');
  }//end of paid_trigger function

  public function ship_trigger()
  {
      return ($this->paid_trigger ? 'shipment' : 'warehouse');
  }//end of paid_trigger function


}// end of model
