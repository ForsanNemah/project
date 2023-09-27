<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactorder extends Model
{
    
    protected $table = 'contact_orders';
    protected $fillable = ['name', 'phone'];
    public $timestamps = false;

    
    
}
