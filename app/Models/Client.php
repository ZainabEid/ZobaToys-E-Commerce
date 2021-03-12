<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast;

class Client extends Model
{
    
    protected $fillable = [
        'surname','first_name', 'last_name', 'phone', 'address',
    ]; 
    protected $casts = [
        'phone' => 'array',
    ];

    protected $appends = [
        'name', 'email', 'gender'
    ];


    public function getNameAttribute()
    {
        return  $this->gender.' '.$this->first_name.' '.$this->last_name  ;
    }
    public function getGenderAttribute()
    {
        if (isset($this->surname)) {
            return $this->surname ? 'Ms.' :'Mr.';
        }else{
            return "";
        }
    }// end of surname attribute
    

    ############## relationships ###################
    
    // one to many --> a client has many orders
    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function user()
    {
        return  $this->hasOne(User::class);
    }

}//end of model
