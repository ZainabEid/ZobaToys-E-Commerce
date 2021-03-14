<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProductIssues extends Model
{
    protected $table = 'user_product_issues';

    protected $fillable = [
        'product_id','user_id', 'avg_star', 'in_wishlist','in_cart'
    ];

    protected $appends = [

    ];

    
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id' , 'id');
    }//end of product()


    public function users()
    {
        return $this->belongsTo(User::class, 'user_id' , 'id');
    }// end of User


}// end of model
