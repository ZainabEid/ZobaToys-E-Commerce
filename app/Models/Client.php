<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast;

class Client extends Model
{
    protected $fillable = [
        'name', 'phone', 'address',
    ]; 
    protected $casts = [
        'phone' => 'array',
    ];
}
