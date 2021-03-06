<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast;

class Client extends Model
{
    
    protected $fillable = [
        'name', 'phone', 'address','email', 'username', 'password' 
    ]; 
    protected $casts = [
        'phone' => 'array',
    ];





    ############## relationships ###################
    
    // one to many --> a client has many orders
    public function order()
    {
        return $this->hasMany(Order::class);
    }

}//end of model
