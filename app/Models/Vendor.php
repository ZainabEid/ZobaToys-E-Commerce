<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class Vendor extends Model
{
    use Notifiable;
    protected $fillable = [
        'name','logo', 'phone', 'address', 'about','admin_id','avg_star',
    ];
    protected $appends = ['image_path'];


    public function getImagePathAttribute()
    {
        return asset('assets/uploads/vendor_logos/'.$this->logo);
    }// end of get image path attribute

    ################## start relaion #################
    public function products()
    {
        return $this->hasMany(Product::class);
    }// end of products

    public function admins()
    {
        return $this->belongsToMany(Admin::class);
    }// end of admin

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('stars_rate');
    }  // end of users
    

    ################## end relaion #################
}
