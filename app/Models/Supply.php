<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    protected $fillable = [
        'supplier_id','group_id', 'name',  'color', 'purchase_price', 'image', 'description', 'stock', 'stock_unit' 
    ];

    protected $appends = ['image_path'];

    ############### Start Relations ###############

    public function supplier (){
        
        return $this-> belongsTo(Supplier::class,'supplier_id');
        
    }// end of supplier
  
    public function group (){
        
        return $this-> belongsTo(Group::class);
        
    }// end of group
    
    public function purchases()
    {
        return $this->belongsToMany(Purchase::class);
        
    }// end of purchases

    ############### End Relations ###############


    public function getImagePathAttribute()
    {
        return asset('assets/uploads/supply_images/'.$this->image);
    }// end of get image path

}//end of model
