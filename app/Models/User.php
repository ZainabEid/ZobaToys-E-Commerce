<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'name' , 'wishlist_products', 'cart_products'
     ];

     //returns all products which this user added it to his wishlist
     public function getWishlistProductsAttribute()
     {
        return $this->userProductIssues->where('in_wishlist',true)->pluck('product_id');
     }// end of wish list product

     //returns all products which this user added it to his wishlist
     public function getCartProductsAttribute()
     {
        return $this->userProductIssues->where('in_cart',true)->pluck('product_id');
     }// end of wish list product

    

    

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

    public function userProductIssues()
    {
        return $this->hasMany(UserProductIssues::class, 'user_id', 'id');
    }// end of product user issues
    ##########  END Relations ###########

    
}// end of User Model
