<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

   
    protected $fillable = [
         'email', 'password', 'client_id'
    ];
     
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'name' ,
     ];
 
    ############## Getting Attributes ###################

    public function getNameAttribute()
    {    
        return $this->client->first_name." ".$this->client->last_name;
    }


    ########## Start Relations ###########
    public function client()
    {
        return $this->belongsTo(Client::class);
    }//end of client
    ##########  END Relations ###########

    
}// end of User Model
