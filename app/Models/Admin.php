<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;


class Admin extends Authenticatable
{
    use Notifiable;
    use LaratrustUserTrait;
    //use Notifiable;

   
    protected $fillable = [
        'name', 'email', 'phone', 'photo', 'password', 'created_at', 'updated_at',
    ];

    protected $appends = ['image_path'];

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    // there is an error here
    public function getImagePathAttribute()
    {
        return asset('assets/uploads/admin_images/'.$this->photo);
    }// end of get image path attribute

    ############ Start Relations #############    
   public function vendor()
   {
       return $this->hasOne(Vendor::class); 
   }
    ############ End  Relations #############    
}
