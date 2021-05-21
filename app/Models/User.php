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
        'name', 'wishlist_products', 'cart_products'
    ];



    ############## Getting Attributes ###################

    public function getNameAttribute()
    {
        return $this->client->first_name . " " . $this->client->last_name;
    } //end of name attribute

    //returns all products which this user added it to his wishlist
    public function getWishlistProductsAttribute()
    {
        return $this->products->pivot->where('in_wishlist', true);
    } // end of wish list product

    ########## Start Relations ###########
    public function client()
    {
        return $this->belongsTo(Client::class);
    } //end of client

    public function cart()
    {
        return $this->hasOne(Cart::class);
    } //end of client

    public function products()
    {
        return $this->belongsToMany(Product::class);
    } // end of product user issues

    public function vendors()
    {
        return $this->belongsToMany(Vendor::class)->withPivot('stars_rate');
    }
    ##########  END Relations ###########


}// end of User Model
