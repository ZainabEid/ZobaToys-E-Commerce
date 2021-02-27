<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = [
        'name','logo', 'phone', 'address', 'about','admin_id',
    ];
    protected $appends = ['image_path'];


    public function getImagePathAttribute()
    {
        return asset('public/uploads/vendor_logos/'.$this->logo);
    }// end of get image path attribute

    ################## start relaion #################
    public function products()
    {
        return $this->hasMany(Product::class);
    }// end of products

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }// end of admin

    ################## end relaion #################
}
