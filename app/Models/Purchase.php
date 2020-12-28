<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'supplier_id', 'total_price'
    ];




    ######### Start Relations #########
    
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }//end of supplier

    public function supplies()
    {
        return $this->belongsToMany(Supply::class)->withPivot('quantity');
    }//end of supplies

    ######### End Relations #########


}//end of model
