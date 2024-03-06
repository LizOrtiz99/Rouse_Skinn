<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    protected $fillable = [
        'name', 
        'tax_identification_number', 
        'phone_number', 
        'email', 
        '_token', 
    ];
}
